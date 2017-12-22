<?php

namespace app\controllers;

use app\models\MemberPhone;
use app\models\Phone;
use app\models\Users;
use app\tool\M3Result;
use app\tool\sms\SendTemplateSMS;
use yii;

/**
 * Class UserController
 * @package app\controllers
 * 会员中心管理
 */
class UserController extends CommonController
{


    /**
     * @return string|yii\web\Response
     * 登陆功能
     */
    public function actionAuth()
    {
        $this->layout = 'layout2';
        if (Yii::$app->request->isGet) {
            $url = Yii::$app->request->referrer;
            if (empty($url)) {
                $url = "/";
            }
            Yii::$app->session->setFlash('referrer', $url);
        }
        $model = new Users();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->login($post)) {
                return $this->redirect(['/']);
            }
        }
        return $this->render('auth', ['model' => $model]);
    }


    /**
     * @return string|yii\web\Response
     * 普通账号注册
     */
    public function actionRegister()
    {

        $this->layout = 'layout2';
        $model = new Users();
        $model->scenario = 'register';//注册验证场景
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->register($post)) {
                return $this->redirect(['user/auth']);
            }
        }
        return $this->render('register', ['model' => $model]);
    }


    /**
     * @return yii\web\Response
     * 退出
     */
    public function actionOut()
    {
        Yii::$app->session->remove('user_name');
        Yii::$app->session->remove('user_login');
        if (!isset(Yii::$app->session['user_login'])) {
            return $this->goBack(Yii::$app->request->referrer);
        }
    }

    //qq回调地址登陆进来之后的数
    public function actionQqcallback()
    {
        $this->enableCsrfValidation = false;
//        $code = Yii::$app->request->get('code');
//        $state = Yii::$app->request->get('state');
//        echo $code.'<br>';
//        echo $state.'<br>';
        require_once '../vendor/qqlogin/qqConnectAPI.php';
        $auth = new \OAuth();
        $accessToken = $auth->qq_callback();
        $open_id = $auth->get_openid();
//         var_dump($open_id);die;
        $qc = new \QC($accessToken, $open_id);
        $user_info = $qc->get_user_info();//用户信息


        $session = Yii::$app->session;
        $session['user_info'] = $user_info;//将用户信息存入session
        $session['open_id'] = $open_id;//获取open_id
        //用户有绑定qq的话，就跳转到首页，否则就去注册

        $user = Users::find()->where(['open_id' =>$session['open_id']])->one();

        if ($user) {
            $session['user_name'] = $user_info['nickname'];
            $session['user_login'] = 1;
            return $this->redirect(['index/index']);
        }
        return $this->redirect(['user/qqregister']);
    }


    //显示qq界面
    public function actionQqlogin()
    {

        require_once '../vendor/qqlogin/qqConnectAPI.php';
        $qc = new \QC();
        $qc->qq_login();
    }


    public function actionQqregister()
    {
        $this->layout = 'layout2';
        $model = new Users();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
       $post['Users']['open_id'] = Yii::$app->session['open_id'];//获取open_id
            $model->scenario = 'qqregister';
            if ($model->qqregister($post)) {
                return $this->redirect(['index/index']);
            }
//            var_dump($model->getErrors());
        }


        return $this->render('qqregister', ['model' => $model]);
    }


    /**
     * @return string
     * 短信接口发送
     */
    public function actionSms()
    {
        $M3Result = new M3Result();
        $phone = Yii::$app->request->get('phone');
        if ($phone == '') {
            $M3Result->status = 1;
            $M3Result->message = '手机号不为空';
            $M3Result->toJson();
        }

        if (strlen($phone) != 11 || $phone[0] != '1') {
            $M3Result->status = 1;
            $M3Result->message = '手机号格式不正确';
            $M3Result->toJson();
        }


        $sms = new SendTemplateSMS();
        $code = '';
        $charset = '1234567890';
        $strLen = strlen($charset) - 1;
        for ($i = 0; $i < 6; $i++) {
            $code .= $charset[mt_rand(0, $strLen)];
        }

        $phoneUser = Phone::find()->where(['phone' => $phone])->one();
        if ($phoneUser->phone) {
            $M3Result->status = 1000;
            $M3Result->message = '手机号码已经存在';
            $M3Result->toJson();
        }
        $M3Result = $sms->sendTemplateSMS($phone, array($code, 60), 1);
        if ($M3Result->status == 0) {
            $phoneModel = new Phone();
            $phoneModel->phone = $phone;
            $phoneModel->code = $code;
            $phoneModel->deadline = date('Y-m-d H:i:s', time() + 60 * 60);
            $phoneModel->save();
        }
        $M3Result->toJson();
    }


    public function actionApi()
    {

        $phone = new Phone();
        $phone->phone = 18819069937;
        $phone->code = 123456;
        $phone->deadline = date('Y-m-d H:i:s', time() + 3600);
        $phone->save();
    }


    public function actionRegisterphone()
    {
        $this->layout = 'layout1';
        $M3Result = new M3Result();
        if (Yii::$app->request->isPost) {
            $phone = Yii::$app->request->post('phone');
            $password = Yii::$app->request->post('password');
            $repassword = Yii::$app->request->post('repassword');
            $phone_code = Yii::$app->request->post('phone_code');
//            if($phone == ''){
//                $M3Result->status = 1;
//                $M3Result->message = '手机号不为空';
//                $M3Result->toJson();
//            }

            $phoneModel = Phone::find()->where(['phone' => $phone])->one();

            if ($phoneModel->code == $phone_code) {
                if (time() > strtotime($phoneModel->deadline)) {
                    $M3Result->status = 1;
                    $M3Result->message = '手机号验证码不正确';
                    $M3Result->toJson();
                }

                $phoneUser = MemberPhone::find()->where(['phone' => $phone])->one();
                if ($phoneUser->phone) {
                    $M3Result->status = 1000;
                    $M3Result->message = '手机号码已经存在';
                    $M3Result->toJson();
                }
                $MemberPhoneModel = new MemberPhone();
                $MemberPhoneModel->phone = $phone;
                $MemberPhoneModel->password = md5($password);
                $MemberPhoneModel->create_time = time();
                $MemberPhoneModel->save();
                $M3Result->status = 0;
                $M3Result->message = '注册成功';
                $M3Result->toJson();
            } else {
                $M3Result->status = 10;
                $M3Result->message = '手机号验证码不正确';
                $M3Result->toJson();
            }


        }
        return $this->render('register_phone');

    }


}
