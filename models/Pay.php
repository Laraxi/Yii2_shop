<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/30
 * Time: 11:35
 */
namespace app\models;
/**
 * Class Pay
 * @package app\models
 * 支付模型
 */

class Pay
{
    /**
     * @param $order_id
     * 请求支付宝网关
     */
    public static function alipay($order_id)
    {
        //查询订单的总价
        $amount  = Order::find()->where(['order_id'=>$order_id])->one()->amount;
        if($amount){
            require_once '../vendor/AliPay/AlipayPay.php';//请求支付宝页面
            $aliPay = new \AlipayPay();//请求支付网关
            //查询该订单下的所有的商品
            $OrderDetails= OrderDetail::find()->where(['order_id'=>$order_id])->asArray()->all();
            $custom_title = 'rick商城';
            $body = '';
            foreach ($OrderDetails as $orderDetail){
                $body .= Goods::find()->where(['goods_id'=>$orderDetail['goods_id']])->one()->title;

            }
            $body .= '等商品'.'-';
            $showUrl = 'http://www.cntxb.com';
//            www.cntxb.com&subject=rick商城&total_fee=2719.00&sign=0c3148ada62cbb08ff23f5cab636d9f6&sign_type=MD5
            $html = $aliPay->requestPay($order_id,$custom_title,$amount,$body,$showUrl);
            echo $html;//跳转支付宝页面
        }
    }


    /**
     * @param $data
     * @return bool
     * 异步通知接口模型数据
     */
    public static function notify($data)
    {
        require_once '../vendor/AliPay/AlipayPay.php';//请求支付宝页面
        $aliPay = new \AlipayPay();
        $verify_result = $aliPay->verifyNotify();//调用异步借口
        if($verify_result){
            $out_trade_no = $data['extra_common_param'];//订单id
           $trade_no =  $data['trade_no'];//交易号
            $trade_status = $data['trade_status'];//交易状态
            $status = Order::PAYFAILED;//初始值为假
            if($trade_status == 'TRADE_FINISHED' || $trade_status == 'TRADE_SUCCESS'){
                $status = Order::PAYSUCCESS;//获取订单成功状态
                $order_info = Order::find()->where('order_id = :order_id',[':order_id'=>$out_trade_no])->one();
                if(!$order_info){//当前订单不存在
                    return false;
                }
                if($order_info->status == Order::CHECKORDER){
                    //支付成功的情况将数据表的字段修改为202
                    Order::updateAll(['status'=>$status,'trade_no'=>$trade_no,'tradeext'=>json_encode($data)],'order_id = :order_id ',[':order_id'=>$order_info->order_id]);
                }else{
                    return false;
                }
            }
            return true;
        }else{
            return false;
        }
    }
}