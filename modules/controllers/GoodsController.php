<?php

namespace app\modules\controllers;

use app\models\Category;
use app\models\Goods;
use crazyfd\qiniu\Qiniu;
use yii;
use yii\web\Controller;

/**
 * Class ArticleController
 * @package app\modules\controllers
 * 后台商品管理
 */
class GoodsController extends CommonController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $layout = 'public';

    /**
     * @return string
     * 商品展示
     */
    public function actionIndex()
    {
        $model = Goods::find();
        $count = $model->count();
        $page = new yii\data\Pagination(['totalCount' => $count, 'pageSize' => 5]);
        $lists = $model->offset($page->offset)->limit($page->limit)->orderBy('create_time desc')->all();
        return $this->render('index', ['lists' => $lists, 'page' => $page]);
    }


    /**
     * @return string|yii\web\Response
     * 添加商品
     */
    public function actionAdd()
    {
        $model = new Goods();
        $cateModel = new Category();
        $list = $cateModel->getOptions();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();

            $pics = $this->upload();//图片处理
            if (!$pics) {
                $model->addError('cover', '封面图不为空');
            } else {
                $post['Goods']['cover'] = $pics['cover'];
                $post['Goods']['pics'] = $pics['pics'];
            }
            if ($pics && $model->add($post)) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('add', ['model' => $model, 'list' => $list]);
    }

    /**
     * @return array|bool
     * 七牛图片上传方法
     */
    public function upload()
    {
        if ($_FILES['Goods']['error']['cover'] > 0) {
            return false;
        }
        $qiniu = new Qiniu(Goods::AK, Goods::SK, Goods::DOMAIN, Goods::BUCKET);
        $key = uniqid();
        $qiniu->uploadFile($_FILES['Goods']['tmp_name']['cover'], $key);
        $cover = $qiniu->getLink($key);
        $pics = [];
        foreach ($_FILES['Goods']['tmp_name']['pics'] as $k => $file) {
            if ($_FILES['Goods']['error']['pics'][$k] > 0) {
                continue;
            }
            $key = uniqid();
            $qiniu->uploadFile($file, $key);
            $pics[$key] = $qiniu->getLink($key);
        }
        return ['cover' => $cover, 'pics' => json_encode($pics)];
    }

    /**
     * @return string
     * 更新商品
     */
    public function actionEdit()
    {
        $goods_id = Yii::$app->request->get('goods_id');
        $cateModel = new Category();
        $list = $cateModel->getOptions();
        $model = Goods::find()->where(['goods_id' => $goods_id])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $qiniu = new Qiniu(Goods::AK, Goods::SK, Goods::DOMAIN, Goods::BUCKET);
            $post['Goods']['cover'] = $model->cover;
            if ($_FILES['Goods']['error']['cover'] == 0) {
                $key = uniqid();
                $qiniu->uploadFile($_FILES['Goods']['tmp_name']['cover'], $key);
                $post['Goods']['cover'] = $qiniu->getLink($key);
                $qiniu->delete(basename($model->cover));
            }
            $pics = [];
            foreach ($_FILES['Goods']['tmp_name']['pics'] as $k => $file) {
                if ($_FILES['Goods']['error']['pics'][$k] > 0) {
                    continue;
                }
                $key = uniqid();
                $qiniu->uploadfile($file, $key);
                $pics[$key] = $qiniu->getlink($key);
            }
            $post['Goods']['pics'] = json_encode(array_merge((array)json_decode($model->pics, true), $pics));
            if ($model->load($post) && $model->save()) {
//                Yii::$app->session->setFlash('info', '修改成功');
                return $this->redirect(['index']);
            }
        }
        return $this->render('add', ['model' => $model, 'list' => $list]);
    }

    /**
     * @return yii\web\Response
     * 编辑时可以删除多张图片
     */
    public function actionRemovepic()
    {

        $key = Yii::$app->request->get("key");
        $goods_id = Yii::$app->request->get("goods_id");
        $model = Goods::find()->where('goods_id = :goods_id', [':goods_id' => $goods_id])->one();
        $qiniu = new Qiniu(Goods::AK, Goods::SK, Goods::DOMAIN, Goods::BUCKET);
        $qiniu->delete($key);
        $pics = json_decode($model->pics, true);
        unset($pics[$key]);
        Goods::updateAll(['pics' => json_encode($pics)], 'goods_id = :goods_id', [':goods_id' => $goods_id]);
        return $this->redirect(['goods/edit', 'goods_id' => $goods_id]);
    }


    /**
     * @return yii\web\Response
     * 商品删除连同七牛的资源图片一并删除
     */
    public function actionDel()
    {
        $goods_id = Yii::$app->request->get("goods_id");
        $model = Goods::find()->where('goods_id = :goods_id', [':goods_id' => $goods_id])->one();
        $key = basename($model->cover);
        $qiniu = new Qiniu(Goods::AK, Goods::SK, Goods::DOMAIN, Goods::BUCKET);
        $qiniu->delete($key);
        $pics = json_decode($model->pics, true);
        foreach ($pics as $key => $file) {
            $qiniu->delete($key);
        }
        Goods::deleteAll('goods_id = :goods_id', [':goods_id' => $goods_id]);
        return $this->redirect(['index']);
    }


    /**
     * @return yii\web\Response
     * 商品上架
     */
    public function actionOn()
    {
        $goods_id = Yii::$app->request->get("goods_id");
        Goods::updateAll(['ison' => '1'], 'goods_id = :goods_id', [':goods_id' => $goods_id]);
        return $this->redirect(['index']);
    }

    /**
     * @return yii\web\Response
     * 商品下架
     */
    public function actionOff()
    {
        $goods_id = Yii::$app->request->get("goods_id");
        Goods::updateAll(['ison' => '0'], 'goods_id = :goods_id', [':goods_id' => $goods_id]);
        return $this->redirect(['index']);
    }


    public function actionUeditor()
    {
        $model = new Goods();

        return $this->render('ueditor',['model'=>$model]);

    }


}