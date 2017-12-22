<?php
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title btn btn-success">
                    订单管理
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-left">
                            <form action="<?= \yii\helpers\Url::to(['index']) ?>" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="title"
                                           value="<?= Yii::$app->request->get('title'); ?>" placeholder="按标题检索">
                                    <span class="input-group-btn"><button class="btn btn-default"
                                                                          type="submit">搜索</button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                        <div class="DTTT_container">
                            <table id="example" class="table table-striped responsive-utilities jambo_table dataTable"
                                   aria-describedby="example_info">
                                <thead>
                                <tr class="headings" role="row">
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Invoice : activate to sort column ascending"
                                        style="">订单编号
                                    </th>

                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">下单人
                                    </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">收货地址
                                    </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">快递方式
                                    </th>


                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">订单总价
                                    </th>

                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">商品列表
                                    </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">订单状态
                                    </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">操作
                                </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?= $order->order_id ?></td>
                                        <td><?= $order->username ?></td>
                                        <td><?= $order->address ?></td>
                                        <td><?= Yii::$app->params['express'][$order->express_id] ?></td>
                                        <td><?= $order->amount ?></td>
                                        <td>
                                        <?php foreach ($order->goodsData as $good): ?>
                                          <p><a href=""><?= $good->num ?>X <?= $good->title ?></a></p>
                                        <?php endforeach; ?>
                                        </td>
                                        <td>  <?= $order->pay_status ?></td>
                                        <td>
                                                     <!-- 只有等待发货状态才显示-->
                                            <?php if ($order->status == 202) : ?>
                                                <a href="<?= \yii\helpers\Url::to(['order/send', 'order_id' => $order->order_id]) ?>">发货</a>
                                            <?php endif; ?>
                                            <a href="<?= \yii\helpers\Url::to(['order/detail', 'order_id' => $order->order_id]) ?>">查看</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
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
