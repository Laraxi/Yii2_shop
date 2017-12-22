<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/15
 * Time: 18:56
 */
namespace app\modules\controllers;
use app\modules\models\Admin;
use yii\web\Controller;
use yii;
/**
 * Class ArticleController
 * @package app\modules\controllers
 * 后台登陆相关管理
 */
class PublicController extends Controller
{
    /**
     * @return string|yii\web\Response
     * 登陆操作
     */
    public function actionLogin()
    {
//        session_start();
//        var_dump($_SESSION);


        $model = new Admin();

        if (Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();
            if ($model->login($post)) {

                //验证成功，进行跳转页面
                return $this->redirect(['default/index']);
                Yii::$app->end();
            }
        }
        return $this->renderPartial('login', ['model' => $model]);
    }


    /**
     * @return yii\web\Response
     * 退出
     */
    public function actionOut()
    {
        Yii::$app->session->remove('isLogin');
        Yii::$app->session->remove('admin_user');
        //不存在的isLogin的时候跳转到登陆页面
        if(!isset(Yii::$app->session['isLogin']))
        {
            return $this->redirect(['public/login']);
            Yii::$app->end();
        }
        return $this->goBack();

    }

    /**
     * @return string
     * 邮件发送及验证找回密码
     */
    public function actionSeekpassword()
    {
        $this->layout = 'layout2';
        $model = new Admin();

        if(Yii::$app->request->isPost)
        {
            $post = Yii::$app->request->post();

            if($model->seekPassword($post))
            {
              Yii::$app->session->setFlash('info','邮件已经发送，请查收');
            }
        }

        return $this->render('seekpassword', ['model' => $model]);
    }



}