<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/12
 * Time: 15:10
 */
namespace app\modules\controllers;


/**
 * Class ArticleController
 * @package app\modules\controllers
 * 后台首页管理
 */

class DefaultController extends CommonController
{

    public $layout = 'public';
    public function actionIndex()
    {
        return $this->render('index');

    }

}