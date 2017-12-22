<!-- ============================================================= HEADER : END ============================================================= -->		<section id="cart-page">
        <div class="container">
            <!-- ========================================= CONTENT ========================================= -->
            <?= \yii\helpers\Html::beginForm(['order/add'],'post')  ?>
            <div class="col-xs-12 col-md-9 items-holder no-margin">
                <?php $total = 0; ?>
                <?php foreach ($data as $k=>$cart): ?>
                    <input type="hidden" name="OrderDetail[<?php echo $k;?>][goods_id]" value="<?php echo $cart['goods_id']?>">
                    <input type="hidden" name="OrderDetail[<?php echo $k;?>][price]" value="<?php echo $cart['price']?>">
                    <input type="hidden" name="OrderDetail[<?php echo $k;?>][goods_num]" value="<?php echo $cart['goods_num']?>">


                <div class="row no-margin cart-item">
                    <div class="col-xs-12 col-sm-2 no-margin">
                        <a href="<?php echo \yii\helpers\Url::to(['goods/detail','goods_id'=>$cart['goods_id']])?>" class="thumb-holder">
                            <img class="lazy" alt="" src="http://<?php echo $cart['cover']?>-picssmall" />
                        </a>
                    </div>

                    <div class="col-xs-12 col-sm-5 ">
                        <div class="title">
                            <a href="<?php echo \yii\helpers\Url::to(['goods/detail','goods_id'=>$cart['goods_id']])?>"><?php echo $cart['title']?></a>
                        </div>
                        <div class="brand">sony</div>
                    </div>

                    <div class="col-xs-12 col-sm-3 no-margin">
                        <div class="quantity">
                            <div class="le-quantity">

                                    <a class="minus" href="#reduce"></a>
                                    <input name="goods_num" id="<?php echo $cart['cart_id']?>" readonly="readonly" type="text" value="<?php echo $cart['goods_num']?>" />
                                    <a class="plus" href="#add"></a>

                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-2 no-margin">
                        <div class="price">
                            ￥<?php echo $cart['price']?>
                        </div>
                        <a class="close-btn" href="<?php echo \yii\helpers\Url::to(['cart/del','cart_id'=>$cart['cart_id']])?>"></a>
                    </div>
                </div><!-- /.cart-item -->
                    <?php $total += $cart['price'] * $cart['goods_num']; ?>
                <?php endforeach; ?>

            </div>
            <!-- ========================================= CONTENT : END ========================================= -->

            <!-- ========================================= SIDEBAR ========================================= -->

            <div class="col-xs-12 col-md-3 no-margin sidebar ">
                <div class="widget cart-summary">
                    <h1 class="border">商品购物车</h1>
                    <div class="body">
                        <ul class="tabled-data no-border inverse-bold">
                            <li>
                                <label>购物车总价</label>
                                <div class="value pull-right">￥<span><?php echo $total;?></span> </div>
                            </li>
                        </ul>
                        <ul id="total-price" class="tabled-data inverse-bold no-border">
                            <li>
                                <label>订单总价</label>
                                <div class="value pull-right">￥   <span><?php echo $total;?></span> </div>
                            </li>
                        </ul>
                        <div class="buttons-holder">
                            <input type="submit" class="le-button"  value="去结算">
                            <a class="simple-link block" href="<?php echo \yii\helpers\Url::to(['index/index'])?>" >继续购物</a>
                        </div>
                    </div>
                </div><!-- /.widget -->

                <div id="cupon-widget" class="widget">
                    <h1 class="border">使用优惠券</h1>
                    <div class="body">

                            <div class="inline-input">
                                <input data-placeholder="请输入优惠券码" type="text" />
                                <button class="le-button" type="submit">使用</button>
                            </div>

                    </div>
                </div><!-- /.widget -->
            </div><!-- /.sidebar -->


            <!-- ========================================= SIDEBAR : END ========================================= -->
        </div>
    </section>		<!-- ============================================================= FOOTER ============================================================= -->
<?php \yii\helpers\Html::endForm(); ?>