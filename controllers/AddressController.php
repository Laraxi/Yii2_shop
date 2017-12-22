<?php

namespace app\controllers;

use app\models\Address;
use app\models\Users;
use Yii;
use yii\web\Controller;

/**
 * Class AddressController
 * @package app\controllers
 * 地址管理
 */
class AddressController extends Controller
{

    /**
     * @return \yii\web\Response
     * 地址创建
     */
    public function actionAdd()
    {
        //检测是否登陆
        if (Yii::$app->session['user_login'] != 1) {
            return $this->redirect(['user/auth']);
        }
        //获取当前登陆用户id
        $user_id = Users::find()->where('username = :username or open_id = :open_id', [':username' => Yii::$app->session['user_name'],'open_id'=>Yii::$app->session['open_id']])->one()->id;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $post['user_id'] = $user_id;
            $post['address'] = $post['address1'] . $post['address2'];
            $post['create_time'] = time();
            $data['Address'] = $post;
            $model = new Address();
            $model->load($data);
            $model->save();
        }
        return $this->redirect($_SERVER['HTTP_REFERER']);
    }
}
