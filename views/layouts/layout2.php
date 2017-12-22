<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/red.css">
    <link rel="stylesheet" href="/css/owl.carousel.css">
    <link rel="stylesheet" href="/css/owl.transitions.css">
    <link rel="stylesheet" href="/css/animate.min.css">
    <link rel="stylesheet" href="/css/book1.css">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <!-- ============================================================= TOP NAVIGATION ============================================================= -->
    <nav class="top-bar animate-dropdown">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-margin">
                <ul>
                    <li><a href="<?php echo \yii\helpers\Url::to(['index/index']) ?>">首页</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['cart/index']) ?>">我的购物车</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['order/index']) ?>">我的订单</a></li>

                </ul>
            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-6 no-margin">
                <ul class="right">

                    <?php if (Yii::$app->session['user_login'] == 1): ?>
                        你好，欢迎你回来 <?php echo Yii::$app->session['user_name'] ?>
                        <a href="<?php echo \yii\helpers\Url::to(['user/out']) ?>">退出</a>
                    <?php else : ?>
                        <li><a href="<?php echo \yii\helpers\Url::to(['user/register']) ?>">注册</a></li>
                        <li><a href="<?php echo \yii\helpers\Url::to(['user/auth']) ?>">登录</a></li>
                    <?php endif; ?>
                </ul>
            </div><!-- /.col -->
        </div><!-- /.container -->
    </nav><!-- /.top-bar -->
    <!-- ============================================================= TOP NAVIGATION : END ============================================================= -->
    <!-- ============================================================= HEADER ============================================================= -->
    <header>
        <div class="container no-padding">

            <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                <!-- ============================================================= LOGO ============================================================= -->
                <div class="logo">
                    <a href="<?= \yii\helpers\Url::to(['/']) ?>">
                        <img alt="logo" src="/images/logo.png" width="233" height="54"/>
                    </a>
                </div><!-- /.logo -->
                <!-- ============================================================= LOGO : END ============================================================= -->
            </div><!-- /.logo-holder -->

            <div class="col-xs-12 col-sm-12 col-md-6 top-search-holder no-margin">
                <div class="contact-row">
                    <div class="phone inline">
                        <i class="fa fa-phone"></i> (+086) 123 456 7890
                    </div>
                    <div class="contact inline">
                        <i class="fa fa-envelope"></i> contact@<span class="le-color">rickshop</span>
                    </div>
                </div><!-- /.contact-row -->
                <!-- ============================================================= SEARCH AREA ============================================================= -->
                <div class="search-area">
                    <form>
                        <div class="control-group">
                            <input class="search-field" placeholder="搜索商品"/>

                            <ul class="categories-filter animate-dropdown">
                                <li class="dropdown">

                                    <a class="dropdown-toggle" data-toggle="dropdown" href="category-grid.html">所有分类</a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li role="presentation"><a role="menuitem" tabindex="-1"
                                                                   href="category-grid.html">电子产品</a></li>

                                    </ul>
                                </li>
                            </ul>

                            <a style="padding:15px 15px 13px 12px" class="search-button" href="#"></a>

                        </div>
                    </form>
                </div><!-- /.search-area -->
                <!-- ============================================================= SEARCH AREA : END ============================================================= -->
            </div><!-- /.top-search-holder -->

            <div class="col-xs-12 col-sm-12 col-md-3 top-cart-row no-margin">
                <div class="top-cart-row-container">

                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                    <div class="top-cart-holder dropdown animate-dropdown">

                        <div class="basket">

                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <div class="basket-item-count">
                                    <span class="count">3</span>
                                    <img src="/images/icon-cart.png" alt=""/>
                                </div>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <img alt="" src="/images/products/product-small-01.jpg"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 no-margin">
                                                <div class="title">前端课程</div>
                                                <div class="price">￥270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <img alt="" src="/images/products/product-small-01.jpg"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 no-margin">
                                                <div class="title">Java课程</div>
                                                <div class="price">￥270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>

                                <li>
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                <div class="thumb">
                                                    <img alt="" src="/images/products/product-small-01.jpg"/>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 no-margin">
                                                <div class="title">PHP课程</div>
                                                <div class="price">￥270.00</div>
                                            </div>
                                        </div>
                                        <a class="close-btn" href="#"></a>
                                    </div>
                                </li>


                                <li class="checkout">
                                    <div class="basket-item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <a href="cart.html" class="le-button inverse">查看购物车</a>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <a href="checkout.html" class="le-button">去往收银台</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div><!-- /.basket -->
                    </div><!-- /.top-cart-holder -->
                </div><!-- /.top-cart-row-container -->
                <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->
            </div><!-- /.top-cart-row -->

        </div><!-- /.container -->

        <!-- ========================================= NAVIGATION ========================================= -->
        <nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
            <div class="container">
                <div class="yamm navbar">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#mc-horizontal-menu-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div><!-- /.navbar-header -->
                    <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                        <ul class="nav navbar-nav">

                            <?php foreach ($this->params['menu'] as $menu) : ?>
                                <li class="dropdown">
                                    <a href="<?= \yii\helpers\Url::to(['goods/index', 'category_id' => $menu['id']]) ?>"
                                       class="dropdown-toggle" data-hover="dropdown"
                                       data-toggle="dropdown"><?= $menu['title'] ?></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">

                                                    <?php foreach ($menu['child'] as $child) : ?>
                                                        <div class="col-xs-12 col-sm-4">
                                                            <h2>Laptops &amp; Notebooks</h2>
                                                            <ul>
                                                                <li>
                                                                    <a href="<?= \yii\helpers\Url::to(['goods/index', 'category_id' => $child['id']]) ?>"><?= $child['title'] ?></a>
                                                                </li>
                                                            </ul>
                                                        </div><!-- /.col -->
                                                    <?php endforeach; ?>
                                                </div><!-- /.row -->
                                            </div><!-- /.yamm-content --></li>
                                    </ul>
                                </li>
                            <?php endforeach; ?>

                        </ul><!-- /.navbar-nav -->
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.navbar -->
            </div><!-- /.container -->
        </nav><!-- /.megamenu-vertical -->
        <!-- ========================================= NAVIGATION : END ========================================= -->
    </header>
    <div class="bk_toptips"><span></span></div>
    <?= $content; ?>

    <footer id="footer" class="color-bg">


        <div class="link-list-row">
            <div class="container no-padding">
                <div class="col-xs-12 col-md-4 ">
                    <!-- ============================================================= CONTACT INFO ============================================================= -->
                    <div class="contact-info">
                        <div class="footer-logo">
                            <img alt="logo" src="/images/logo.png" width="233" height="54"/>
                        </div><!-- /.footer-logo -->
                        <p class="regular-bold"> 请通过电话，电子邮件随时联系我们</p>

                        <p>
                            深圳市宝安区西乡街道
                            <br>
                        </p>
                    </div>
                    <!-- ============================================================= CONTACT INFO : END ============================================================= -->
                </div>


            </div><!-- /.container -->
        </div><!-- /.link-list-row -->

        <div class="copyright-bar">
            <div class="container">
                <div class="col-xs-12 col-sm-6 no-margin">
                    <div class="copyright">
                        &copy; <a href="index.html">Imooc.com</a> - all rights reserved
                    </div><!-- /.copyright -->
                </div>
                <div class="col-xs-12 col-sm-6 no-margin">
                    <div class="payment-methods ">
                        <ul>
                            <li><img alt="" src="/images/payments/payment-visa.png"></li>
                            <li><img alt="" src="/images/payments/payment-master.png"></li>
                            <li><img alt="" src="/images/payments/payment-paypal.png"></li>
                            <li><img alt="" src="/images/payments/payment-skrill.png"></li>
                        </ul>
                    </div><!-- /.payment-methods -->
                </div>
            </div><!-- /.container -->
        </div><!-- /.copyright-bar -->

    </footer><!-- /#footer -->
    <!-- ============================================================= FOOTER : END ============================================================= -->
</div><!-- /.wrapper -->

<!-- JavaScripts placed at the end of the document so the pages load faster -->
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/jquery-migrate-1.2.1.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/gmap3.min.js"></script>
<script src="/js/bootstrap-hover-dropdown.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/css_browser_selector.min.js"></script>
<script src="/js/echo.min.js"></script>
<script src="/js/jquery.easing-1.3.min.js"></script>
<script src="/js/bootstrap-slider.min.js"></script>
<script src="/js/jquery.raty.min.js"></script>
<script src="/js/jquery.prettyPhoto.min.js"></script>
<script src="/js/jquery.customSelect.min.js"></script>
<script src="/js/wow.min.js"></script>
<script src="/js/scripts.js"></script>
<script>
    $(function () {
        $('.btn-qq').click(function () {
            window.location.href = '<?= \yii\helpers\Url::to(["user/qqlogin"]) ?>';
        });



        //查看物流隐藏

        $('.expressshow').hide();
        $('.express').hover(function () {
            var a = $(this);
            if(a.attr('data') != 'ok'){
                var url = '<?= \yii\helpers\Url::to(["order/getexpress"]) ?>';
                var data = {'express_no' : $(this).attr('data')};
                $.get(url,data,function (res) {
                    var str = '';
                    if(res.message == 'ok'){
                        for (var i=0;i<res.data.length;i++){
                            str += "<p>" + res.data[i].context + "" + res.data[i].time + "</p>";
                        }
                    }
                    a.find(".expressshow").html(str);
                    a.attr('data','ok');
                },'json');
            }
            $(this).find(".expressshow").show();
        },function () {
            $(this).find(".expressshow").hide();
        });




    })
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>