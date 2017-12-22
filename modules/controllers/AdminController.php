<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/1
 * Time: 0:52
 */
namespace app\modules\controllers;
use app\modules\models\Admin;
use yii;

/**
 * Class AdminController
 * @package app\modules\controllers
 * 后台管理
 */

class AdminController extends CommonController
{

    public $layout = 'public';
    public function actionIndex()
    {
//        http://127.0.0.1:210/index.php?r=admin/managers/mangers&page=1//数据分页

        $model = Admin::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['manage'];//1页显示几条
        $page = new yii\data\Pagination(['totalCount'=>$count,'pageSize'=>$pageSize]);
        $managers = $model->offset($page->offset)->limit($page->limit)->all();
        return $this->render('index',['data'=>$managers,'page'=>$page]);
    }
    public function actionAdd()
    {
        $model  = new Admin();
        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            $model->scenario = 'admin_add';
            if($model->load($post) && $model->validate()){
                $model->save();
                $this->redirect(['index']);
            }

        }

        return $this->render('add',['model'=>$model]);
    }



    public function actionEdit($id)
    {
//        echo $id;
//        $model  = new Admin();
//        if(Yii::$app->request->isPost)
//        {
//            $post = Yii::$app->request->post();
//            if($model->add($post)){
//                $this->redirect(['index']);
//            }
//        }
//
//        return $this->render('add',['model'=>$model]);
    }



    public function actionDel()
    {
        $id = (int)Yii::$app->request->get('id');
        if(empty($id))
        {
            $this->redirect(['index']);
        }
        $model = new Admin();
        if($model->deleteAll('id = :id',[':id'=>$id]));
        {
            $this->redirect(['index']);
        }
    }
}