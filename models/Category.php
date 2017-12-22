<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/30
 * Time: 11:35
 */
namespace app\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
/**
 * Class Article
 * @package app\modules\models
 * 分类模型
 */
class Category extends ActiveRecord
{
    /**
     * @return string
     * 设置数据表
     */
    public static function tableName()
    {
        return '{{%category}}';
    }


    public function attributeLabels()
    {
        return [
            'title'=>'分类名称',
            'parent_id'=>'上级分类',
        ];
    }


    /**
     * @return array
     * 设置验证规则
     */
    public function rules()
    {
        return [
            ['parent_id', 'required', 'message' => '上级分类不能为空'],
            ['title', 'required', 'message' => '分类不能为空'],
            ['title', 'string', 'min' => 2, 'max' => 10, 'tooShort' => '分类不能少于2位', 'tooLong' => '分类不能大于10位'],
        ];
    }


    /**
     * @param $data
     * @return bool
     * 添加模型数据
     */
    public function add($data)
    {
        if ($this->load($data) && $this->validate()) {
//            $this->create_time = time();
            //这里需要注意的是前面有验证的，那么添加的时候不需要在验证，传false即可
            if ($this->save(false)) {
                return true;
            }
            return false;
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

    public function getCategory()
    {
        $category = self::find()->all();
//        $category = ArrayHelper::toArray($category);
        return $category;
    }

    public function getTree($category, $parent_id = 0)
    {
        $tree = [];
        foreach ($category as $value) {
            if ($value['parent_id'] == $parent_id) {
                $tree[] = $value;
                $tree = array_merge($tree, $this->getTree($category, $value['id']));
            }
        }
        return $tree;
    }


    public function setPrefix($data, $p = "|-----")
    {
        $tree = [];
        $num = 1;
        $prefix = [0 => 1];
        while($val = current($data)) {
            $key = key($data);
            if ($key > 0) {
                if ($data[$key - 1]['parent_id'] != $val['parent_id']) {
                    $num ++;
                }
            }
            if (array_key_exists($val['parent_id'], $prefix)) {
                $num = $prefix[$val['parent_id']];
            }
            $val['title'] = str_repeat($p, $num).$val['title'];
            $prefix[$val['parent_id']] = $num;
            $tree[] = $val;
            next($data);
        }
        return $tree;
    }

    public function getOptions()
    {
        $data = $this->getCategory();
        $tree = $this->getTree($data);
        $tree = $this->setPrefix($tree);
        $options = ['添加顶级分类'];
        foreach($tree as $cate) {
            $options[$cate['id']] = $cate['title'];
        }
        return $options;
    }


    public function getTreeList()
    {
        $data = $this->getCategory();
        $tree = $this->getTree($data);
        $lists = $this->setPrefix($tree);
        return $lists;
    }
    /*******************************获取前台数据********************************************************/

    public function getMenu()
    {
       $top =  self::find()->where('parent_id = :parent_id',[':parent_id'=>0])->orderBy('create_time asc')->asArray()->all();
       $data = [];
        foreach ($top as $k=>$category)
        {
            $category['child'] =  self::find()->where('parent_id = :parent_id',[':parent_id'=>$category['id']])->limit(10)->asArray()->all();
            $data[$k] = $category;
        }

        return $data;
    }



}

