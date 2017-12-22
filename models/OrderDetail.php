<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/30
 * Time: 11:35
 */
namespace app\models;

use yii;
use yii\db\ActiveRecord;

/**
 * Class Article
 * @package app\modules\models
 * 订单详情模型
 */
class OrderDetail extends ActiveRecord
{

    /**
     * @return string
     * 设置数据表
     */
    public static function tableName()
    {
        return '{{%order_detail}}';
    }



    public function rules()
    {
        return [
            [['goods_id','goods_num','price','order_id','create_time'],'required'],
        ];
    }


    public function add($data)
    {
        if ($this->load($data) && $this->save()) {
            return true;
        }
        return false;
    }


}