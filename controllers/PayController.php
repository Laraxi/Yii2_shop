<?php

namespace app\controllers;
use app\models\Goods;
use app\models\Pay;
use yii;

/**
 * Class IndexController
 * @package app\controllers
 * 支付管理
 */
class PayController extends CommonController
{

    public $enableCsrfValidation = false;//关闭csrf

    /**
     *异步通知
     */
    public function actionNotify()
    {
        if(Yii::$app->request->isPost){
            $post = Yii::$app->request->post();
            if(Pay::notify($post)) {
                echo 'success';
                exit;
            }else{
                echo 'fail';exit;
            }
        }

    }

    /**
     *同步通知
     */
    public function actionReturn()
    {
        $this->layout ='layout1';
       $trade_status =  Yii::$app->request->get('trade_status');//交易状态
        if($trade_status == 'TRADE_SUCCESS'){
            $status = 'ok';
        }else{
            $status = 'no';
        }
        return $this->render('status',['status'=>$status]);

    }


}
