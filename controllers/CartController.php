<?php

namespace app\controllers;

use app\models\Cart;
use app\models\Goods;
use app\models\Users;
use Yii;
use yii\web\Controller;

/**
 * Class CartController
 * @package app\controllers
 * 购物车管理
 */

class CartController extends Controller
{


//    public function actionTest()
//    {
//       $data =  Users::find()->where(['id'=>18])->one()->id;
//        if(!is_null($data)){
//            var_dump($data);
//        }else{
//            echo '暂无数据';
//        }
//
//    }

    public function actionIndex()
    {

        $this->layout = 'layout1';
        if (Yii::$app->session['user_login'] !=1) {
            return $this->redirect(['user/auth']);
        }

        $open_id = Yii::$app->session['open_id'];//qq登陆open_id身份标示
        $user_id = Users::find()->where('username = :username or open_id = :open_id', [':username' => Yii::$app->session['user_name'],':open_id'=>$open_id])->one()->id;

            $cart = Cart::find()->where('user_id = :user_id', [':user_id' => $user_id])->all();

            $data = [];
            foreach ($cart as $key => $value) {
                $goods = Goods::find()->where('goods_id = :goods_id', [':goods_id' => $value['goods_id']])->one();
                $data[$key]['cover'] = $goods->cover;
                $data[$key]['title'] = $goods->title;
                $data[$key]['goods_num'] = $value['goods_num'];
                $data[$key]['price'] = $value['price'];
                $data[$key]['goods_id'] = $value['goods_id'];
                $data[$key]['cart_id'] = $value['id'];
            }
            return $this->render('index', ['data' => $data]);
        }



    public function actionAdd()
    {
        $this->layout = 'layout1';

        if (Yii::$app->session['user_login'] !=1) {
            return $this->redirect(['user/auth']);
        }
        //获取当前登陆用户id
        $open_id = Yii::$app->session['open_id'];//qq登陆open_id身份标示
           $user_id = Users::find()->where('username = :username or open_id = :open_id',[':username'=>Yii::$app->session['user_name'],'open_id'=>$open_id])->one()->id;

           if(!is_null($user_id)){
               /**
                * 商品详情购物车添加
                */
               if (Yii::$app->request->isPost) {
                   $post = Yii::$app->request->post();
                   $goods_num = Yii::$app->request->post('goods_num');
                   $data['Cart'] = $post;
                   $data['Cart']['user_id'] = $user_id;
               }

               /**
                * 商品列表购物车添加
                */
               if (Yii::$app->request->isGet) {
                   $goods_id = Yii::$app->request->get('goods_id');
                   if (!$goods_id) {
                       return $this->redirect(['index/index']);
                   }
                   $model = Goods::find()->where('goods_id = :goods_id', [':goods_id' => $goods_id])->one();
                   $price = $model->issale ? $model->sale_price : $model->price;
                   $goods_num = 1;
                   $data['Cart'] = ['goods_id' => $goods_id, 'goods_num' => $goods_num, 'price' => $price, 'user_id' => $user_id];
               }

               //查询购物车数据是否为同一件商品
               if (!$model = Cart::find()->where('goods_id = :goods_id and user_id = :user_id', [':goods_id' => $data['Cart']['goods_id'], ':user_id' => $data['Cart']['user_id']])->one()) {
                   $model = new Cart();//新增
               } else {
                   $data['Cart']['goods_num'] = $model->goods_num + $goods_num;//数量加1
               }
               $data['Cart']['create_time'] = time();
               $model->load($data);
               $model->save();
               return $this->redirect(['cart/index']);

           }
    }


    /**
     * 修改购物车
     */
    public function actionSave()
    {
        if (Yii::$app->session['user_login'] !=1) {
            return $this->redirect(['user/auth']);
        }
        $goods_num = Yii::$app->request->get('goods_num');
        $cart_id = Yii::$app->request->get('cart_id');
        Cart::updateAll(['goods_num'=>$goods_num,'id'=>$cart_id]);
    }


    /**
     * @return \yii\web\Response
     * 删除购物车
     */
    public function actionDel()
    {
        if (Yii::$app->session['user_login'] !=1) {
            return $this->redirect(['user/auth']);
        }
        $cart_id = Yii::$app->request->get('cart_id');
        Cart::deleteAll(['id'=>$cart_id]);
        return $this->redirect(['cart/index']);
    }


}