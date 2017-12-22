<!-- ============================================================= HEADER : END ============================================================= -->
<div id="top-banner-and-menu">
    <div class="container">
        <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
            <!-- ================================== TOP NAVIGATION ================================== -->
            <div class="side-menu animate-dropdown">
                <div class="head"><i class="fa fa-list"></i> 所有分类</div>
                <nav class="yamm megamenu-horizontal" role="navigation">
                    <ul class="nav">
                        <?php foreach ($this->params['menu'] as $menu): ?>
                            <li class="dropdown menu-item">
                                <a href="<?php echo \yii\helpers\Url::to(['goods/index', 'category_id' => $menu['id']]) ?>"
                                   class="dropdown-toggle" data-toggle="dropdown"><?= $menu['title'] ?></a>
                                <ul class="dropdown-menu mega-menu">


                                    <?php foreach ($menu['child'] as $child): ?>
                                        <li class="yamm-content">
                                            <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                            <div class="row">
                                                <div class="col-xs-12 col-lg-4">
                                                    <ul>
                                                        <li>
                                                            <a href="<?php echo \yii\helpers\Url::to(['goods/index', 'category_id' => $child['id']]) ?>"><?= $child['title'] ?></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dropdown-banner-holder">
                                                    <a href="#"><img alt=""
                                                                     src="/images/banners/banner-side.png"/></a>
                                                </div>
                                            </div>
                                            <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li><!-- /.menu-item -->
                        <?php endforeach; ?>

                        <!--<li><a href="http://themeforest.net/item/media-center-electronic-ecommerce-html-template/8178892?ref=shaikrilwan">Buy this Theme</a></li>-->
                    </ul><!-- /.nav -->
                </nav><!-- /.megamenu-horizontal -->
            </div><!-- /.side-menu -->
            <!-- ================================== TOP NAVIGATION : END ================================== -->
        </div><!-- /.sidemenu-holder -->

        <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->

            <div id="hero">
                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

                    <div class="item" style="background-image: url(/images/sliders/nav1.jpg);">
                        <div class="container-fluid">
                            <div class="caption vertical-center text-left">
<!--                                <div class="big-text fadeInDown-1">-->
<!--                                    最高优惠<span class="big"><span class="sign">￥</span>400</span>-->
<!--                                </div>-->

<!--                                <div class="excerpt fadeInDown-2">-->
<!--                                    潮玩生活<br>-->
<!--                                    享受生活<br>-->
<!--                                    引领时尚-->
<!--                                </div>-->
<!--                                <div class="small fadeInDown-2">-->
<!--                                    最后 5 天限时抢购-->
<!--                                </div>-->
<!--                                <div class="button-holder fadeInDown-3">-->
<!--                                    <a href="single-product.html" class="big le-button ">去购买</a>-->
<!--                                </div>-->
                            </div><!-- /.caption -->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                    <div class="item" style="background-image: url(/images/sliders/nav2.jpg);">
                        <div class="container-fluid">
<!--                            <div class="caption vertical-center text-left">-->
<!--                                <div class="big-text fadeInDown-1">-->
<!--                                    想获得<span class="big"><span class="sign">￥</span>200</span>的优惠？-->
<!--                                </div>-->
<!---->
<!--                                <div class="excerpt fadeInDown-2">-->
<!--                                    速速前来 <br>快速抢购<br>-->
<!--                                </div>-->
<!--                                <div class="small fadeInDown-2">-->
<!--                                    优惠等你拿-->
<!--                                </div>-->
<!--                                <div class="button-holder fadeInDown-3">-->
<!--                                    <a href="single-product.html" class="big le-button ">去购买</a>-->
<!--                                </div>-->
<!--                            </div><!-- /.caption -->-->
                        </div><!-- /.container-fluid -->
                    </div><!-- /.item -->

                </div><!-- /.owl-carousel -->
            </div>

            <!-- ========================================= SECTION – HERO : END ========================================= -->
        </div><!-- /.homebanner-holder -->

    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

<!-- ========================================= HOME BANNERS ========================================= -->
<section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <img src="/images/banners/bananaer-center.jpg" alt="">
<!--        <div class="col-xs-12 col-lg-6 no-margin banner">-->
<!--            <a href="category-grid.html">-->
<!--                <div class="banner-text theblue">-->
<!--                    <h1 style="font-family:'Microsoft Yahei';">尝尝鲜</h1>-->
<!--                    <span class="tagline">查看最新分类</span>-->
<!--                </div>-->
<!--                <img class="banner-image" alt="" src="//images/blank.gif"-->
<!--                     data-echo="/images/banners/banner-left1.jpg"/>-->
<!--            </a>-->
<!--        </div>-->
<!--        <div class="col-xs-12 col-lg-6 no-margin text-right banner">-->
<!--            <a href="category-grid.html">-->
<!--                <div class="banner-text right">-->
<!--                    <h1 style="font-family:'Microsoft Yahei';">时尚流行</h1>-->
<!--                    <span class="tagline">查看最新上架</span>-->
<!--                </div>-->
<!--                <img class="banner-image" alt="" src="//images/blank.gif"-->
<!--                     data-echo="/images/banners/banner-narrow-02.jpg"/>-->
<!--            </a>-->
<!--        </div>-->
    </div><!-- /.container -->
</section><!-- /#banner-holder -->
<!-- ========================================= HOME BANNERS : END ========================================= -->
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#featured" data-toggle="tab">推荐商品</a></li>
                <li><a href="#new-arrivals" data-toggle="tab">最新上架</a></li>
                <li><a href="#top-sales" data-toggle="tab">最佳热卖</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                        <?php foreach ($data['tui'] as $value): ?>
                            <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                                <div class="product-item">

                                    <?php if ($value['ishot']): ?>
                                        <div class="ribbon red"><span>HOT</span></div>
                                    <?php endif; ?>

                                    <?php if ($value['istui']): ?>
                                        <div class="ribbon red"><span>TUI</span></div>
                                    <?php endif; ?>

                                    <?php if ($value['issale']): ?>
                                        <div class="ribbon red"><span>sale</span></div>
                                    <?php endif; ?>
                                    <div class="image">
                                        <img alt="" src="http://<?= $value->cover ?>-covercenter"/>
                                    </div>
                                    <div class="body">
                                        <div class="label-discount green">-50% sale</div>
                                        <div class="title">
                                            <a href="<?= \yii\helpers\Url::to(['goods/detail', 'goods_id' => $value['goods_id']]) ?>">
                                                <?=
                                                 mb_substr($value->title, 0, 30, 'utf-8');
                                                ?>
                                            </a>
                                        </div>
                                        <div class="brand">sony</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">￥<?= $value->price ?></div>
                                        <div class="price-current pull-right">￥<?= $value->sale_price ?></div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'goods_id' => $value['goods_id']]) ?>"
                                               class="le-button">加入购物车</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            查看更多</a>
                    </div>

                </div>
                <div class="tab-pane" id="new-arrivals">
                    <div class="product-grid-holder">

                        <?php foreach ($data['new'] as $value): ?>
                            <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                                <div class="product-item">

                                    <?php if ($value['ishot']): ?>
                                        <div class="ribbon red"><span>HOT</span></div>
                                    <?php endif; ?>

                                    <?php if ($value['istui']): ?>
                                        <div class="ribbon red"><span>TUI</span></div>
                                    <?php endif; ?>

                                    <?php if ($value['issale']): ?>
                                        <div class="ribbon red"><span>sale</span></div>
                                    <?php endif; ?>
                                    <div class="image">
                                        <img alt="" src="http://<?= $value->cover ?>-covercenter"/>
                                    </div>
                                    <div class="body">
                                        <div class="label-discount green">-50% sale</div>
                                        <div class="title">
                                            <a href="<?= \yii\helpers\Url::to(['goods/detail', 'goods_id' => $value['goods_id']]) ?>"><?= mb_substr($value->title, 0, 30, 'utf-8'); ?></a>
                                        </div>
                                        <div class="brand">sony</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">￥<?= $value->price ?></div>
                                        <div class="price-current pull-right">￥<?= $value->sale_price ?></div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'goods_id' => $value['goods_id']]) ?>"
                                               class="le-button">加入购物车</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            查看更多</a>
                    </div>

                </div>

                <div class="tab-pane" id="top-sales">
                    <div class="product-grid-holder">

                        <?php foreach ($data['hot'] as $value): ?>
                            <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                                <div class="product-item">

                                    <?php if ($value['ishot']): ?>
                                        <div class="ribbon red"><span>HOT</span></div>
                                    <?php endif; ?>

                                    <?php if ($value['istui']): ?>
                                        <div class="ribbon red"><span>TUI</span></div>
                                    <?php endif; ?>

                                    <?php if ($value['issale']): ?>
                                        <div class="ribbon red"><span>sale</span></div>
                                    <?php endif; ?>
                                    <div class="image">
                                        <img alt="" src="http://<?= $value->cover ?>-covercenter"/>
                                    </div>
                                    <div class="body">
                                        <div class="label-discount green">-50% sale</div>
                                        <div class="title">
                                            <a href="<?= \yii\helpers\Url::to(['goods/detail', 'goods_id' => $value['goods_id']]) ?>"><?= mb_substr($value->title, 0, 30, 'utf-8'); ?></a>
                                        </div>
                                        <div class="brand">sony</div>
                                    </div>
                                    <div class="prices">
                                        <div class="price-prev">￥<?= $value->price ?></div>
                                        <div class="price-current pull-right">￥<?= $value->sale_price ?></div>
                                    </div>

                                    <div class="hover-area">
                                        <div class="add-cart-button">
                                            <a href="<?= \yii\helpers\Url::to(['cart/add', 'goods_id' => $value['goods_id']]) ?>"
                                               class="le-button">加入购物车</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            查看更多</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================================= BEST SELLERS ========================================= -->
<section id="bestsellers" class="color-bg wow fadeInUp">
    <div class="container">
        <h1 class="section-title">销量最佳</h1>

        <div class="product-grid-holder medium">
            <div class="col-xs-12 col-md-7 no-margin">


                <div class="row no-margin">
                    <?php foreach ($data['all'] as $value): ?>
                        <div class="col-xs-12 col-sm-4 no-margin product-item-holder size-medium hover">
                            <div class="product-item">
                                <div class="image">
                                    <img alt="" src="http://<?= $value->cover ?>-covercenter"
                                    />
                                </div>
                                <div class="body">
                                    <div class="label-discount clear"></div>
                                    <div class="title">
                                        <a href="<?= \yii\helpers\Url::to(['goods/detail', 'goods_id' => $value['goods_id']]) ?>"><?= mb_substr($value->title, 0, 30, 'utf-8'); ?></a>
                                    </div>
                                    <div class="brand">beats</div>
                                </div>
                                <div class="prices">

                                    <div class="price-current text-right">￥<?= $value->sale_price ?></div>
                                </div>
                                <div class="hover-area">
                                    <div class="add-cart-button">
                                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'goods_id' => $value['goods_id']]) ?>"
                                           class="le-button">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.product-item-holder -->
                    <?php endforeach; ?>
                </div><!-- /.row -->
            </div><!-- /.col -->
<!--            <div class="col-xs-12 col-md-5 no-margin">-->
<!--                <div class="product-item-holder size-big single-product-gallery small-gallery">-->
<!---->
<!--                    <div id="best-seller-single-product-slider" class="single-product-slider owl-carousel">-->
<!--                        <div class="single-product-gallery-item" id="slide1">-->
<!--                            <a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">-->
<!--                                <img alt="" src="//images/blank.gif"-->
<!--                                     data-echo="/images/products/product-gallery-01.jpg"/>-->
<!--                            </a>-->
<!--                        </div><!-- /.single-product-gallery-item -->
<!---->
<!--                        <div class="single-product-gallery-item" id="slide2">-->
<!--                            <a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">-->
<!--                                <img alt="" src="//images/blank.gif"-->
<!--                                     data-echo="/images/products/product-gallery-01.jpg"/>-->
<!--                            </a>-->
<!--                        </div><!-- /.single-product-gallery-item -->
<!---->
<!--                        <div class="single-product-gallery-item" id="slide3">-->
<!--                            <a data-rel="prettyphoto" href="images/products/product-gallery-01.jpg">-->
<!--                                <img alt="" src="//images/blank.gif"-->
<!--                                     data-echo="/images/products/product-gallery-01.jpg"/>-->
<!--                            </a>-->
<!--                        </div><!-- /.single-product-gallery-item -->
<!--                    </div><!-- /.single-product-slider -->
<!---->
<!--                    <div class="gallery-thumbs clearfix">-->
<!--                        <ul>-->
<!--                            <li><a class="horizontal-thumb active" data-target="#best-seller-single-product-slider"-->
<!--                                   data-slide="0" href="#slide1"><img alt="" src="//images/blank.gif"-->
<!--                                                                      data-echo="/images/products/gallery-thumb-01.jpg"/></a>-->
<!--                            </li>-->
<!--                            <li><a class="horizontal-thumb" data-target="#best-seller-single-product-slider"-->
<!--                                   data-slide="1" href="#slide2"><img alt="" src="//images/blank.gif"-->
<!--                                                                      data-echo="/images/products/gallery-thumb-01.jpg"/></a>-->
<!--                            </li>-->
<!--                            <li><a class="horizontal-thumb" data-target="#best-seller-single-product-slider"-->
<!--                                   data-slide="2" href="#slide3"><img alt="" src="//images/blank.gif"-->
<!--                                                                      data-echo="/images/products/gallery-thumb-01.jpg"/></a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div><!-- /.gallery-thumbs -->
<!---->
<!--                    <div class="body">-->
<!--                        <div class="label-discount clear"></div>-->
<!--                        <div class="title">-->
<!--                            <a href="single-product.html">CPU intel core i5-4670k 3.4GHz BOX B82-12-122-41</a>-->
<!--                        </div>-->
<!--                        <div class="brand">sony</div>-->
<!--                    </div>-->
<!--                    <div class="prices text-right">-->
<!--                        <div class="price-current inline">￥1199.00</div>-->
<!--                        <a href="cart.html" class="le-button big inline">加入购物车</a>-->
<!--                    </div>-->
<!--                </div><!-- /.product-item-holder -->
<!--            </div><!-- /.col -->

<!--        </div><!-- /.product-grid-holder -->
    </div><!-- /.container -->
</section><!-- /#bestsellers -->
<!-- ========================================= BEST SELLERS : END ========================================= -->
