<?php

namespace app\modules\controllers;

use app\models\Address;
use app\models\Goods;
use app\models\Order;
use app\models\OrderDetail;
use app\models\Users;
use yii;

/**
 * Class ArticleController
 * @package app\modules\controllers
 * 后台分类管理
 */
class OrderController extends CommonController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public $layout = 'public';


    public function actionIndex()
    {

        $OrderModel = new Order();
        $model = Order::find();
        $count = $model->count();
        $page = new yii\data\Pagination(['totalCount' => $count, 'pageSize' => 10]);
        $orders = $model->offset($page->offset)->limit($page->limit)->orderBy('order_id desc')->all();
        $data = $OrderModel->getOrderDetail($orders);
        return $this->render('index', ['orders' => $data, 'page' => $page]);
    }


    public function actionDetail()
    {
        $order_id = Yii::$app->request->get('order_id');
        $order = Order::find()->where(['order_id' => $order_id])->one();
        $orderDetails = OrderDetail::find()->where(['order_id'=>$order->order_id])->all();
        $goodsData = [];
        foreach ($orderDetails as$orderDetail ){
            $goods = Goods::find()->where(['goods_id'=>$orderDetail->goods_id])->one();
            $goods->goods_num = $orderDetail->goods_num;
            $goodsData[] = $goods;
        }

        $order->goodsData = $goodsData;
        $order->address = Address::find()->where(['address_id'=>$order->address_id])->one()->address;
        $order->pay_status = Order::$status[$order->status];
        $order->username  = Users::find()->where(['id'=>$order->user_id])->one()->username;
        return $this->render('detail',['order'=>$order]);
    }



    public function actionSend($order_id)
    {

        $model =  Order::find()->where(['order_id'=>$order_id])->one();
        $model->scenario = 'send_fahuo';
        if(Yii::$app->request->isPost){
            $post  = Yii::$app->request->post();
            $model->status = Order::SENDED;
            if($model->load($post) && $model->save()){
                return $this->redirect(['order/index']);
            }
        }
        return $this->render('send',['model'=>$model]);
    }


}
