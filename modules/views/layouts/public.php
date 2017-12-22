<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
        <link rel="stylesheet" href="/admin/css/custom.css">
        <link rel="stylesheet" href="/admin/css/animate.min.css">
        <link rel="stylesheet" href="/admin/css/floatexamples.css">
        <?php $this->head() ?>
    </head>
    <body class="nav-md">
    <?php $this->beginBody() ?>
    <div class="container body">
        <div class="main_container">
            <div class="container body">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><span>西兵后台管理系统</span></a>
                        </div>
                        <div class="clearfix"></div>

                        <!-- menu prile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="/admin/images/img.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Welcome,<?= Yii::$app->session['admin_user']; ?></span>
                                <!--                                      <h2>Anthony Fernando</h2>-->
                            </div>
                        </div>
                        <!-- /menu prile quick info -->

                        <br/>
                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>&nbsp;</h3>
                                <ul class="nav side-menu">
                                    <li><a href="<?= \yii\helpers\Url::to(['index/index']) ?>"><i class="fa fa-home"></i>
                                            后台首页 <span class="fa fa-chevron-down"></span></a>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> 文章管理 <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?= \yii\helpers\Url::to(['article/index']) ?>">文章列表</a>
                                            </li>
                                            <li><a href="<?= \yii\helpers\Url::to(['article/add']) ?>">文章添加</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> 管理员管理 <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?= \yii\helpers\Url::to(['admin/index']) ?>">管理员列表</a>
                                            </li>
                                            <li><a href="<?= \yii\helpers\Url::to(['admin/add']) ?>">管理员添加</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> 分类管理 <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?= \yii\helpers\Url::to(['category/index']) ?>">分类列表</a>
                                            </li>
                                            <li><a href="<?= \yii\helpers\Url::to(['category/add']) ?>">分类添加</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i> 商品管理 <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?= \yii\helpers\Url::to(['goods/index']) ?>">商品列表</a>
                                            </li>
                                            <li><a href="<?= \yii\helpers\Url::to(['goods/add']) ?>">商品添加</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-edit"></i> 订单管理 <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu" style="display: none">
                                            <li><a href="<?= \yii\helpers\Url::to(['order/index']) ?>">订单列表</a>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>
                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                       aria-expanded="false">
                                        <img src="/admin/images/img.jpg" alt=""><?= Yii::$app->session['admin_user']; ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                        <li><a href="javascript:;"> Profile</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">
                                                <span class="badge bg-red pull-right">50%</span>
                                                <span>Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;">Help</a>
                                        </li>
                                        <li><a href="<?= \yii\helpers\Url::to(['public/out']) ?>"><i class="fa fa-sign-out pull-right"></i> 退出</a>
                                        </li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown"
                                        role="menu">
                                        <li>
                                            <a>
                                           <span class="image">
                                       <img src="/admin/images/img.jpg" alt="Profile Image"/>
                                   </span>
                                                <span>
                                       <span>John Smith</span>
                                           <span class="time">3 mins ago</span>
                                           </span>
                                                <span class="message">
                                       Film festivals used to be do-or-die moments for movie makers. They were where...
                                   </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                           <span class="image">
                                       <img src="/admin/images/img.jpg" alt="Profile Image"/>
                                   </span>
                                                <span>
                                       <span>John Smith</span>
                                           <span class="time">3 mins ago</span>
                                           </span>
                                                <span class="message">
                                       Film festivals used to be do-or-die moments for movie makers. They were where...
                                   </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                           <span class="image">
                                       <img src="/admin/images/img.jpg" alt="Profile Image"/>
                                   </span>
                                                <span>
                                       <span>John Smith</span>
                                           <span class="time">3 mins ago</span>
                                           </span>
                                                <span class="message">
                                       Film festivals used to be do-or-die moments for movie makers. They were where...
                                   </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                           <span class="image">
                                       <img src="/admin/images/img.jpg" alt="Profile Image"/>
                                   </span>
                                                <span>
                                       <span>John Smith</span>
                                           <span class="time">3 mins ago</span>
                                           </span>
                                                <span class="message">
                                       Film festivals used to be do-or-die moments for movie makers. They were where...
                                   </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong><a href="inbox.html">See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->
                <?= $content ?>
            </div>
        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>

        <script src="/admin/js/jquery.min.js"></script>
        <script src="/admin/js/bootstrap.min.js"></script>
        <script src="/admin/js/custom.js"></script>
        <script>


            $("#addpic").click(function(){

                var pic = $("#goods-pics").clone();
                pic.attr("style", "margin-left:120px");
                $("#goods-pics").parent().append(pic);
            });

        </script>
        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>