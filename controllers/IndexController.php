<?php

namespace app\controllers;
use app\models\Goods;
use yii;

/**
 * Class IndexController
 * @package app\controllers
 * 前台首页
 */
class IndexController extends CommonController
{
    public function actionIndex()
    {
        $this->layout = 'layout1';
        //1 取出所有被推荐并且是上架的商品
        $data['tui'] =  Goods::find()->where('istui = "1" and ison = "1" ')->orderBy('create_time desc')->limit(4)->all();
        //2 取出最新的上架商品
        $data['new'] = Goods::find()->where('ison = "1" ')->orderBy('create_time desc')->limit(4)->all();
        //3 取出热卖的上架商品
        $data['hot'] = Goods::find()->where('ishot = "1" and ison = "1" ')->orderBy('create_time desc')->limit(4)->all();
        //4 取出所有的上架的商品
        $data['all'] = Goods::find()->where('ison = "1" ')->limit(6)->all();
        return $this->render('index',['data'=>$data]);
    }

    public function actionTest()
    {
        return $this->renderPartial('test');
    }

}
