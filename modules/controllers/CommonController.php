<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/1
 * Time: 0:52
 */
namespace app\modules\controllers;

use yii;
use yii\web\Controller;
/**
 * Class ArticleController
 * @package app\modules\controllers
 * 后台公共管理
 */
class CommonController extends Controller
{

    public function init()
    {
        if (Yii::$app->session['admin_login'] != 1) {
            $this->redirect(['/admin/public/login']);
        }
    }


}