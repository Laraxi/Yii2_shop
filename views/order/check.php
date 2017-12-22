
    <!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= CONTENT ========================================= -->
    <section id="checkout-page">
        <div class="container">
            <div class="col-xs-12 no-margin">
                <section id="shipping-address" style="margin-bottom:100px;margin-top:-10px">
                    <h2 class="border h1">收货地址</h2>
                    <a href="#" id="createlink">新建联系人</a>



                <div class="billing-address" style="display:none;">
                    <h2 class="border h1">新建联系人</h2>
                    <?= \yii\helpers\Html::beginForm(['address/add'],'post') ?>


                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>姓*</label>
                                <input class="le-input" name="first_name" >
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>名*</label>
                                <input class="le-input" name="last_name">
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12">
                                <label>公司名称</label>
                                <input class="le-input" name="company">
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label>地址*</label>
                                <input class="le-input" data-placeholder="例如：北京市朝阳区" name="address1" >
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label>&nbsp;</label>
                                <input class="le-input" data-placeholder="例如：酒仙桥北路"  name="address2">
                            </div>
                        </div><!-- /.field-row -->

                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-4">
                                <label>邮编</label>
                                <input class="le-input"  name="post_code">
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <label>电子邮箱地址*</label>
                                <input class="le-input" name="email" >
                            </div>

                            <div class="col-xs-12 col-sm-4">
                                <label>联系电话*</label>
                                <input class="le-input" name="telephone" >
                            </div>
                        </div><!-- /.field-row -->

                        <div class="place-order-button">
                            <button class="le-button small">新建</button>
                        </div><!-- /.place-order-button -->
                    <?= \yii\helpers\Html::endForm(); ?>
                </div><!-- /.billing-address -->

                    <?php if (Yii::$app->session->hasFlash('success')): ?>
                        <?php echo Yii::$app->session->getFlash('success') ?>
                    <?php endif; ?>


                <?= \yii\helpers\Html::beginForm(['order/confirm'],'post') ?>

                    <?php foreach ($address as $key=>$addres): ?>
                        <div class="row field-row" style="margin-top:10px">
                            <div class="col-xs-12">
                                <input  class="le-radio big" type="radio" name="address" value="<?php echo $addres['address_id']?>" <?php if($key == 0) echo 'checked="checked"' ?>  />
                                <a class="simple-link bold" href="#"><?php echo $addres['first_name'] . $addres['last_name'] ."&nbsp;&nbsp;". $addres['company']."&nbsp;&nbsp;&nbsp;&nbsp;".$addres['post_code']."&nbsp;&nbsp;&nbsp;&nbsp;".$addres['email']."&nbsp;&nbsp;&nbsp;&nbsp;".$addres['address']."&nbsp;&nbsp;&nbsp;&nbsp;".$addres['telephone']  ?></a>
                            </div>
                        </div><!-- /.field-row -->
                    <?php endforeach; ?>
                </section><!-- /#shipping-address -->
                <section id="your-order">
                    <h2 class="border h1">您的订单详情</h2>
                        <?php $total = 0; ?>
                        <?php foreach ($data as $value): ?>

                        <div class="row no-margin order-item">
                            <div class="col-xs-12 col-sm-1 no-margin">
                                <a href="#" class="qty">1 x</a>
                            </div>

                            <div class="col-xs-12 col-sm-9 ">
                                <div class="title"><a href="#"><?= $value['title'] ?></a></div>
                            </div>

                            <div class="col-xs-12 col-sm-2 no-margin">
                                <div class="price">￥<?= $value['price'] ?></div>
                            </div>
                        </div><!-- /.order-item -->
                            <?php $total += $value['goods_num'] * $value['price'] ?>
                        <?php endforeach; ?>


                </section><!-- /#your-order -->

                <div id="total-area" class="row no-margin">
                    <div class="col-xs-12 col-lg-4 col-lg-offset-8 no-margin-right">
                        <div id="subtotal-holder">
                            <ul class="tabled-data inverse-bold no-border">
                                <li>
                                    <label>商品总价</label>
                                    <div id="total" style="width:100%;text-align:right" class="value ">￥<span><?= $total; ?></span> </div>
                                </li>
                                <li>
                                    <label>选择快递</label>
                                    <div style="width:100%;text-align:right" class="value">
                                        <div class="radio-group">
                                            <?php foreach ($express as $key=>$expres): ?>
                                                <?php $checked = ""; if($key == 2 ) $checked = "checked";  ?>
                                                   <input class="le-radio express" type="radio" name="express_id" value="<?= $key; ?>" <?php echo $checked;?> data="<?= $expressPrice[$key] ?>">

                                            <div class="radio-label bold"><?= $expres;?><span class="bold"> ￥<?=  $expressPrice[$key]; ?></span></div><br>
                                            <?php endforeach; ?>
                                         </div>
                                    </div>
                                </li>
                            </ul><!-- /.tabled-data -->

                            <ul id="total-field" class="tabled-data inverse-bold ">
                                <li>
                                    <label>订单总额</label>
                                    <div class="value" style="width:100%;text-align:right" id="ototal">￥<span><?= $total + 20 ?></span>  </div>
                                </li>
                            </ul><!-- /.tabled-data -->

                        </div><!-- /#subtotal-holder -->
                    </div><!-- /.col -->
                </div><!-- /#total-area -->

                <div id="payment-method-options">
                        <div class="payment-method-option">
                            <input class="le-radio" type="radio" name="paymethod" value="alipay" checked>
                            <div class="radio-label bold ">支付宝支付</div>
                        </div><!-- /.payment-method-option -->
                </div><!-- /#payment-method-options -->

                <div class="place-order-button">
                    <input class="le-button big" type="submit" value="确认订单">
                </div><!-- /.place-order-button -->
            </div><!-- /.col -->
        </div><!-- /.container -->
    </section><!-- /#checkout-page -->
    <input type="hidden" name="order_id" value="<?php echo Yii::$app->request->get('order_id'); ?>">
    <?= \yii\helpers\Html::endForm(); ?>
    <!-- ========================================= CONTENT : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->