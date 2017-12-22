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
 * 商品模型
 */
class Goods extends ActiveRecord
{
    /**
     * 七牛图片资源配置
     */
    const AK = 'vc3F0JDxdwideCOHa3Q_5y5SPZSOcrzYX6bAo2dl';
    const SK = 'o7bAzwSO3xQGStchqHMHcYG2XrjAMl85I3KwdSsy';
    const DOMAIN = 'oeno448e5.bkt.clouddn.com';
    const BUCKET = 'shop-cntxb';

    public $goods_num;
    public $cate_name;

    /**
     * @return string
     * 设置数据表
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }


    /**
     * @return array
     * 设置验证规则
     */
    public function rules()
    {
        return [
            ['title', 'required', 'message' => '商品名称不为空'],
            ['descr', 'required', 'message' => '描述不能为空'],
            ['category_id', 'required', 'message' => '分类不能为空'],
            ['price', 'required', 'message' => '商城价格不能为空'],
            ['sale_price', 'required', 'message' => '促销价格不能为空'],
            [['price', 'sale_price'], 'number', 'min' => 0.01, 'message' => '价格必须是数字'],
            ['num', 'required', 'message' => '库存不能为空'],
            ['num', 'integer', 'min' => 0, 'message' => '库存必须是数字'],
            [['issale', 'ishot', 'pics', 'istui', 'cover', 'goods_content', 'ison'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => '商品名称',
            'category_id' => '商品所属分类',
            'descr' => '商品描述',
            'price' => '商品价格',
            'num' => '商品数量',
            'issale' => '是否促销',
            'istui' => '是否推荐',
            'ishot' => '是否热卖',
            'cover' => '商品原图',
            'pics' => '商品图片',
            'sale_price' => '促销价格',
            'ison' => '是否上架',
        ];
    }

    /**
     * @param $data
     * @return bool
     * 添加模型数据
     */
    public function add($data)
    {
        if ($this->load($data) && $this->save()) {
            return true;
        }
        return false;
    }
    /**
     * @param $data
     * @return bool
     * 更新模型数据
     */
    public function edit($data)
    {
        if ($this->load($data) && $this->validate()) {
//            $this->update_time = time();
            //这里需要注意的是前面有验证的，那么添加的时候不需要在验证，传false即可
            if ($this->save(false)) {
                return true;
            }
            return false;
        }
        return false;
    }


//    添加之前或者更新之前的操作
    public function beforeSave($insert)
    {
        //判断父类是否存在
        if (parent::beforeSave($insert)) {
            $time = time();
            //判断是否是添加操作
            if ($this->isNewRecord) {
                $this->create_time = $time;
            }
//            //更新操作
//            $this->update_time = $time;
            return true;
        }
        return false;
    }
}