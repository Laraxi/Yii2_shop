<?php

namespace app\modules\controllers;
use app\modules\models\Article;
use yii;
use yii\web\Controller;

/**
 * Class ArticleController
 * @package app\modules\controllers
 * 后台文章管理
 */
class ArticleController extends Controller
{
    public $layout = 'public';
    public function actionIndex()
    {
        $model = new Article();
        $data = $model->search();
        return $this->render('index', $data);
    }
    public function actionAdd()
    {
        $model = new Article();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->add($post)) {
//                Yii::$app->session->setFlash('info','新增成功');
                return $this->redirect(['index']);
            }
            return $this->render('add', ['model' => $model]);
        }
        return $this->render('add', ['model' => $model]);
    }
    public function actionDelete($id)
    {
        Article::findOne($id)->delete();
        $this->redirect(['index']);
    }


}
