<?php

namespace app\controllers;

use app\models\Goods;
use yii;

/**
 * Class GoodsController
 * @package app\controllers
 * 前台相关的商品
 */

class GoodsController extends CommonController
{

    /**
     * @return string
     * 商品列表（所属分类）
     */
   public function actionIndex()
   {
       $this->layout = 'layout2';
       $category_id = Yii::$app->request->get('category_id');
       $where = "category_id = :category_id and ison = '1'";
       $params = [':category_id'=>$category_id];
       $model = Goods::find()->where($where,$params);
       $all = $model->asArray()->all();
//       print_r($all);die;

       $count = $model->count();
       $page = new yii\data\Pagination(['totalCount'=>$count,'pageSize'=>5]);
       $allData = $model->offset($page->offset)->limit($page->limit)->asArray()->all();

       $tui = $model->where($where . ' and istui = \'1\'',$params)->orderBy('create_time desc')->limit(5)->asArray()->all();
       $hot  = $model->where($where . ' and ishot = \'1\'',$params)->orderBy('create_time desc')->limit(5)->asArray()->all();
       $sale  = $model->where($where . ' and issale = \'1\'',$params)->orderBy('create_time desc')->limit(5)->asArray()->all();

       return $this->render('index',['allData'=>$allData,'sale'=>$sale,'hot'=>$hot,'tui'=>$tui,'page'=>$page,'count'=>$count]);
   }

    /**
     * @return string
     * 商品详情
     */
    public function actionDetail()
    {
        $this->layout = 'layout2';
        $goods_id = Yii::$app->request->get('goods_id');
        $goods = Goods::find()->where('goods_id = :goods_id',[':goods_id'=>$goods_id])->asArray()->one();
        $data_all = Goods::find()->where('ison = "1"')->orderBy('create_time desc')->limit(5)->asArray()->all();
        return $this->render('detail',['goods'=>$goods,'data_all'=>$data_all]);
    }

}
