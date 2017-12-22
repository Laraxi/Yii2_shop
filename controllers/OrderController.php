<?php

namespace app\controllers;

use app\models\Address;
use app\models\Cart;
use app\models\Goods;
use app\models\Order;
use app\models\OrderDetail;
use app\models\Pay;
use app\models\Users;
use dzer\express\Express;
use Yii;
use yii\base\Exception;
use yii\web\Controller;

/**
 * Class OrderController
 * @package app\controllers
 * 订单管理
 */
class OrderController extends CommonController
{
    /**
     * @return string|\yii\web\Response
     * 订单列表首页
     */
    public function actionIndex()
    {

        $this->layout = 'layout2';
        if (Yii::$app->session['user_login'] != 1) {
            return $this->redirect(['user/auth']);
        }
        $user_name = Yii::$app->session['user_name'];
        $user_id = Users::find()->where(['username' => $user_name])->one()->id;
        $model = new Order();
        $orders = $model->getGoodsData($user_id);
        return $this->render('index', ['orders' => $orders]);
    }

    /**
     * @return string|\yii\web\Response
     * 订单收银台页面数据展示
     */
    public function actionCheck()
    {
        $this->layout = 'layout1';
        if (Yii::$app->session['user_login'] != 1) {
            return $this->redirect(['user/auth']);
        }

        $order_id = Yii::$app->request->get('order_id');
        if (!$order_id) {
            return $this->redirect(['cart/index']);
        }

        $status = Order::find()->where('order_id = :order_id', [':order_id' => $order_id])->one()->status;
        if ($status != Order::CREATEORDER && $status != Order::CHECKORDER) {
            return $this->redirect(['order/index']);
        }


        $open_id = Yii::$app->session['open_id'];//qq登陆open_id身份标示
        $user_id = Users::find()->where('username = :username or open_id = :open_id', [':username' => Yii::$app->session['user_name'], 'open_id' => $open_id])->one();


        $address = Address::find()->where(['user_id' => $user_id])->asArray()->all();

        $orderDetails = OrderDetail::find()->where('order_id = :order_id', [':order_id' => $order_id])->asArray()->all();
        $data = [];
        foreach ($orderDetails as $detail) {
            $goodsModel = Goods::find()->where('goods_id = :goods_id', [':goods_id' => $detail['goods_id']])->one();
            $detail['title'] = $goodsModel->title;//商品标题
            $detail['cover'] = $goodsModel->cover;//商品图片
            $data[] = $detail;
        }
        $express = Yii::$app->params['express'];
        $expressPrice = Yii::$app->params['expressPrice'];
        return $this->render('check', ['express' => $express, 'address' => $address, 'expressPrice' => $expressPrice, 'data' => $data]);
    }

    /***
     * @return \yii\web\Response
     * 订单的创建
     */
    public function actionAdd()
    {

        if (Yii::$app->session['user_login'] != 1) {
            return $this->redirect(['user/auth']);
        }
        //说明事务 保证了数据的一致性
        $Transaction = Yii::$app->db->beginTransaction();//创建事务
        try {
            if (Yii::$app->request->isPost) {
                $post = Yii::$app->request->post();
                $orderModel = new Order();
                $orderModel->scenario = 'add';
                $open_id = Yii::$app->session['open_id'];//qq登陆open_id身份标示
                $userModel = Users::find()->where('username = :username or open_id = :open_id', [':username' => Yii::$app->session['user_name'], 'open_id' => $open_id])->one();

                if (!$userModel) {
                    throw new \Exception();
                }

                //插入订单数据
                $user_id = $userModel->id;//获取用户id
                $orderModel->user_id = $user_id;//赋值用户id
                $orderModel->status = Order::CREATEORDER;//订单状态
                $orderModel->create_time = time();//订单时间
                if (!$orderModel->save()) {//订单新增
                    throw new \Exception();
                }
                $order_id = $orderModel->getPrimaryKey();//获取订单新增的id
                //插入订单详情数据
                foreach ($post['OrderDetail'] as $orderDetail) {
                    $detailModel = new OrderDetail();
                    $orderDetail['order_id'] = $order_id;//订单外键id
                    $orderDetail['create_time'] = time();
                    $data['OrderDetail'] = $orderDetail;
                    if (!$detailModel->add($data)) {//订单详情新增
                        throw new \Exception();
                    }
                    //结算订单的时候，清除购物车的数据
                    Cart::deleteAll('goods_id = :goods_id', [':goods_id' => $orderDetail['goods_id']]);
                    //商品表数量更新
                    Goods::updateAllCounters(['num' => -$orderDetail['goods_num']], 'goods_id = :goods_id', [':goods_id' => $orderDetail['goods_id']]);
                }
            }
            $Transaction->commit();//提交事务 这里的数据完全没有错误的情况下才能提交
        } catch (\Exception $e) {
            $Transaction->rollBack();//回滚事务
            return $this->redirect(['cart/index']);//购物车列表
        }
        //跳转到确认页面
        return $this->redirect(['order/check', 'order_id' => $order_id]);
    }

    /**
     * @return \yii\web\Response
     * 确认订单页面
     * 订单的id
     * 用户的id
     * 地址 id 表单当中获取
     * 快递 id  表单当中获取
     * 订单状态 从模型获取
     * 订单的总额   商品的数量 * 商品的单价 + 快递的费用
     */
    public function actionConfirm()
    {
        try {
            if (Yii::$app->session['user_login'] != 1) {
                return $this->redirect(['user/auth']);
            }

            if (!Yii::$app->request->isPost) {
                throw new Exception();
            }

            $post = Yii::$app->request->post();
            $open_id = Yii::$app->session['open_id'];//qq登陆open_id身份标示
            $userModel = Users::find()->where('username = :username or open_id = :open_id', [':username' => Yii::$app->session['user_name'], 'open_id' => $open_id])->one();


            if (empty($userModel)) {
                throw new Exception();
            }

            $user_id = $userModel->id;
            $OrderModel = Order::find()->where('order_id = :order_id and user_id = :user_id', [':order_id' => $post['order_id'], ':user_id' => $user_id])->one();

            if (empty($OrderModel)) {
                throw new Exception();
            }
            $OrderModel->scenario = 'update';//更新验证
            $post['status'] = Order::CHECKORDER;//当前订单的状态

//            当前订单详情的下的商品
            $details = OrderDetail::find()->where('order_id = :order_id', [':order_id' => $post['order_id']])->all();
            $amount = 0;//总价初始值
            foreach ($details as $detail) {
                $amount += $detail->goods_num * $detail->price;//订单详情表 的 商品数量 * 单价 = 总价
            }

            //总价小于0
            if ($amount <= 0) {
                throw new Exception();
            }
            //获取当前快递的价格和post数据快递id
            $express = Yii::$app->params['expressPrice'][$post['express_id']];//获取快递id
            if ($express < 0) {
                throw new Exception();
            }
            $amount += $express;//总价 + 快递的价格
            $post['amount'] = $amount;//更新总价格
            if (empty($post['address'])) {
                throw new Exception();
            }
            $post['address_id'] = $post['address'];//获取当前地址id
            $data['Order'] = $post;//处理所有的订单post数据

//            print_r($data);die;
            if ($OrderModel->load($data) && $OrderModel->save()) {
                //更新数据操作
                return $this->redirect(['order/pay', 'order_id' => $post['order_id'], 'paymethod' => $post['paymethod']]);
            }
        } catch (Exception $e) {
//            var_dump($e->getMessage());
            return $this->redirect(['index/index']);//有错误直接跳转到首页
        }
    }

    /**
     * @return string|void|\yii\web\Response
     * 请求支付宝页面
     */
    public function actionPay()
    {

        try {
            if (Yii::$app->session['user_login'] != 1) {
                return $this->redirect(['user/auth']);
            }
            $order_id = Yii::$app->request->get('order_id');//订单id
            $paymethod = Yii::$app->request->get('paymethod');//订单支付方式
            if (empty($order_id) || empty($paymethod)) {
                throw new Exception();
            }

            //当前是不是支付宝支付方式
            if ($paymethod == 'alipay') {
                return Pay::alipay($order_id);//订单id
            }

        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     *
     * 获取物流信息
     */
    public function actionGetexpress()
    {
        $express_no = Yii::$app->request->get('express_no');
        require_once '../vendor/dzer/yii2-express/src/Express.php';
        //默认返回接口数据
        $res = Express::search($express_no);//根据快递单号自动识别属于那个快递公司
        echo $res;
        exit;
    }


    /**
     * @return \yii\web\Response
     * 确认发货
     */
    public function actionReceived()
    {
        $order_id = Yii::$app->request->get('order_id');
        $order = Order::find()->where(['order_id' => $order_id])->one();
        //当前订单不为空，并且当前订单必须是已发货的状态，才能确认收货
        if (!empty($order) && $order->status == Order::SENDED) {
            $order->status = Order::RECEIVED;//更新成确认收货
            $order->save();
        }
        return $this->redirect(['order/index']);
    }


}