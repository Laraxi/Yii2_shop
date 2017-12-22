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
 * 地址模型
 */
class Address extends ActiveRecord
{

    /**
     * @return string
     * 设置数据表
     */
    public static function tableName()
    {
        return '{{%address}}';
    }


    public function rules()
    {
        return [
            [['user_id','first_name','last_name','address','email','telephone','post_code','company'],'required'],
            ['create_time','safe']
        ];
    }


}