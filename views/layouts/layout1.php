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
    <link rel="stylesheet" href="/css/book.css">


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
                    <?php if(Yii::$app->session['user_login'] == 1): ?>
                        你好，欢迎你回来 <?php echo Yii::$app->session['user_name']?>
                        <img src="<?= Yii::$app->session['figureurl'] ?>" alt="">
                        <a href="<?php echo \yii\helpers\Url::to(['user/out'])?>">退出</a>
                    <?php else : ?>
                        <li><a href="<?php echo \yii\helpers\Url::to(['user/register'])?>">注册</a></li>
                        <li><a href="<?php echo \yii\helpers\Url::to(['user/auth'])?>">登录</a></li>
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
                        <img alt="logo" src="/images/logo.png" height="80px;"/>
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
    </header>
<div class="bk_toptips"><span></span></div>
<?= $content; ?>
    <!-- ============================================================= FOOTER ============================================================= -->
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
                        &copy; <a href="javascript:void(0)"></a>
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

    /**
     * 地址收缩的js
     */
    $("#createlink").click(function(){
        $(".billing-address").slideDown();
    });

    //购物车数量加1
    $(".minus").click(function(){
        var cartid = $("input[name=goods_num]").attr('id');
        var num = parseInt($("input[name=goods_num]").val()) - 1;
        if (parseInt($("input[name=goods_num]").val()) <= 1) {
            var num = 1;
        }
        var total = parseFloat($(".value.pull-right span").html());
        var price = parseFloat($(".price span").html());
        changeNum(cartid, num);//请求ajax
        var p = total - price;
        if (p < 0) {
            var p = "0";
        }
        $(".value.pull-right span").html(p + "");
        $(".value.pull-right.ordertotal span").html(p + "");
    });

    //购物车数量加1
    $(".plus").click(function(){
        var cartid = $("input[name=goods_num]").attr('id');
        var num = parseInt($("input[name=goods_num]").val()) + 1;
        var total = parseFloat($(".value.pull-right span").html());
        var price = parseFloat($(".price span").html());
        changeNum(cartid, num);//请求ajax
        var p = total + price;
        $(".value.pull-right span").html(p + "");
        $(".value.pull-right.ordertotal span").html(p + "");
    });
    /**
     *
     * @param cartid
     * @param goods_num
     * 购物车修改ajax
     */
    function changeNum(cartid, goods_num)
    {
        $.get('<?php echo yii\helpers\Url::to(['cart/save']) ?>', {'goods_num':goods_num, 'cartid':cartid}, function(data){
            location.reload();
        });
    }

    //获取商品总价格
    var total = parseFloat($("#total span").html());
            console.log(total);

    //快递运费
    $(".le-radio.express").click(function(){
        //快递运费 + 商品总价格
        var ototal = parseFloat($(this).attr('data')) + total;
//        console.log(ototal);
        $("#ototal span").html(ototal);//订单总额
    });






</script>


<?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>