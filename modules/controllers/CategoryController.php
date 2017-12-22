<?php

namespace app\modules\controllers;

use app\models\Category;
use yii;
use yii\web\Controller;

/**
 * Class ArticleController
 * @package app\modules\controllers
 * 后台分类管理
 */
class CategoryController extends CommonController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $layout = 'public';

    public function actionIndex()
    {
        $model = new Category();
        $lists = $model->getTreeList();
        return $this->render('index', ['data' => $lists]);
    }


    public function actionAdd()
    {
        $model = new Category();
        $list = $model->getOptions();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->add($post)) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('add', ['model' => $model, 'list' => $list]);
    }


    public function actionEdit()
    {
        $id = Yii::$app->request->get('id');
        $model = Category::find()->where('id = :id', [':id' => $id])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->load($post) && $model->save()) {
                return $this->redirect(['index']);
            }
        }
        $lists = $model->getOptions();
        return $this->render('add', ['model' => $model, 'list' => $lists]);
    }


    public function actionDel()
    {
        try{
            $id = Yii::$app->request->get('id');
            if (empty($id)) {
                throw new \Exception('参数错误');
            }

            $data = Category::find()->where('parent_id = :parent_id',[':parent_id'=>$id])->one();
            if($data){
                throw new \Exception('该分类下有子分类，不允许删除');
            }
            if( !Category::deleteAll('id = :id',[':id'=>$id])){
                throw new \Exception('删除失败');
            }
//            $data =  yii\helpers\ArrayHelper::toArray($data);
//            var_dump($data);
        }catch (\Exception $e){
            Yii::$app->session->setFlash('info',$e->getMessage());
        }
        return $this->redirect(['index']);
    }


}
