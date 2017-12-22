<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/30
 * Time: 11:35
 */
namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Article
 * @package app\modules\models
 * 订单中心模型
 */
class Order extends ActiveRecord
{


    //自定义属性
    public $goodsData;
    public $pay_status;
    public $username;
    public $address;



    /**
     * @return string
     * 设置数据表
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    const CREATEORDER = 0;

    const CHECKORDER = 100;

    const PAYFAILED = 201;

    const PAYSUCCESS = 202;

    const SENDED = 220;

    const RECEIVED = 260;




    public static $status = [
        self::CREATEORDER => '订单初始化',

        self::CHECKORDER => '待支付',

        self::PAYFAILED => '支付失败',

        self::PAYSUCCESS => '等待发货',

        self::SENDED => '已发货',

        self::RECEIVED => '订单完成',
    ];


    public function rules()
    {
        return [
            [['user_id', 'status'], 'required', 'on' => ['add']],
            [['express_no'], 'required','message'=>'快递编号不为空', 'on' => ['send_fahuo']],
            [['address_id', 'express_id', 'amount', 'status'], 'required', 'on' => ['update']],
            ['create_time', 'safe', 'on' => ['add']],
        ];
    }


    public  function getOrderDetail($orders)
    {
        foreach ($orders as $order){
            $order = $this->getOrderData($order);
        }
        return $orders;
    }

    public  function getOrderData($order)
    {
       $details =  OrderDetail::find()->where(['order_id'=>$order->order_id])->all();
        $goodsOnes = [];
        foreach ($details as $detail){
            $goodsOne = Goods::find()->where(['goods_id'=>$detail->goods_id])->one();
//            $goodsOne->goods_num = $detail->goods_num;
            $goodsOnes[] = $goodsOne;
        }

        $order->goodsData = $goodsOnes;
        $order->username = Users::find()->where(['id'=>$order->user_id])->one()->username;
        $order->address = Address::find()->where(['address_id'=>$order->address_id])->one();
        if(empty($order->address)){
            $order->address = '';
        }else{
            $order->address = $order->address->address;
        }

        $order->pay_status = Order::$status[$order->status];
        return $order;
    }



    public  function getGoodsData($user_id)
    {
        $orders =  $this->find()->where('status > 0 and user_id = :user_id',[':user_id'=>$user_id])->orderBy('create_time desc')->all();
        foreach ($orders as $order){
            $details =  OrderDetail::find()->where('order_id = :order_id',[':order_id'=>$order->order_id])->all();
            $goods = [];
            foreach ($details as $detail){
                $goods_one = Goods::find()->where(['goods_id'=>$detail->goods_id])->one();
                $goods_one->num = $detail->goods_num;//订单数量覆盖商品数量
                $goods_one->cate_name = Category::find()->where(['id'=>$goods_one->category_id])->one()->title;//商品所在分类
                $goods[] = $goods_one;
            }
            $order->pay_status = Order::$status[$order->status];
            $order->goodsData = $goods;//商品对象赋值
        }
        return $orders;
    }





}