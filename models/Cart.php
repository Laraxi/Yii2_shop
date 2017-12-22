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
 * 购物车模型
 */
class Cart extends ActiveRecord
{

    /**
     * @return string
     * 设置数据表
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }


    public function rules()
    {
        return [
            [['goods_id','goods_num','user_id','price'],'required'],
            ['create_time','safe']
        ];
    }


}