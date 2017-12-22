<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use yii\web\Controller;

/**
 * Class CommonController
 * @package app\controllers
 * 前台公共管理
 */
class CommonController extends Controller
{

   public function init()
   {
       /**
        * 获取前台分类数据
        */
        $cate = new Category();
        $category =  $cate->getMenu();
       $this->view->params['menu'] = $category;
   }

}
