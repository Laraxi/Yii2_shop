<?php
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title btn btn-success">
                    订单详情
                </div>
                <div class="x_content">

                    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                       <p>订单编号 <span>&nbsp;&nbsp;&nbsp;<?= $order->order_id ?></span> </p>
                       <p>下单用户 <span>&nbsp;&nbsp;&nbsp;<?= $order->username ?></span> </p>
                       <p>收货地址 <span>&nbsp;&nbsp;&nbsp;<?= $order->address ?></span> </p>
                       <p>订单总价 <span>&nbsp;&nbsp;&nbsp;<?= $order->amount ?></span> </p>
                       <p>快递方式 <span>&nbsp;&nbsp;&nbsp;<?= Yii::$app->params['express'][$order->express_id] ?></span> </p>
                       <p>快递编号 <span>&nbsp;&nbsp;&nbsp;<?= $order->express_no ?></span> </p>
                       <p>订单状态 <span>&nbsp;&nbsp;&nbsp;<?= $order->pay_status ?></span> </p>
                       <p>商品列表</p>
                        <?php foreach ($order->goodsData as $value): ?>
                            <div class="display:inline">
                            <img src="http://<?= $value->cover ?>-coversmall">
                           <p> 数量<?= $value->goods_num ?> </p>
                           <p> 商品名称 <?= $value->title ?> </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .pagination li {
            padding-top: 10px;
        }
    </style>
    <!-- /page content -->
