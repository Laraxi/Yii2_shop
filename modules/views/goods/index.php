<?php
use yii\widgets\LinkPager;
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-success">列表</a>
                    <a href="<?= \yii\helpers\Url::to(['add']) ?>" class="btn btn-success">新增</a>
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
                                        style="">id
                                    </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Invoice : activate to sort column ascending"
                                        style="">商品名称
                                    </th>

                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">商品库存
                                    </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">商品价格
                                    </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">促销价格
                                    </th>


                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">是否促销
                                    </th>




                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">是否热卖
                                    </th>



                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">是否推荐
                                    </th>

                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">是否上架
                                    </th>

                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">创建时间
                                    </th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example"
                                        rowspan="1"
                                        colspan="1" aria-label="Order : activate to sort column ascending"
                                        style="">操作
                                </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php foreach ($lists as $value): ?>
                                    <tr class="pointer odd">
                                        <td class=" "><?= $value->goods_id; ?></td>
                                        <td class=" ">
                                            <img src="http://<?= $value->cover; ?>-coversmall" alt="">
                                            <?= mb_substr($value->title,0,30,'utf-8') ; ?>
                                        </td>
                                        <td class=" "><?= $value->num; ?></td>
                                        <td class=" "><?= $value->price; ?></td>
                                        <td class=" "><?= $value->sale_price; ?></td>
                                        <td class=" "><?= $value->issale == 1 ? '促销': '不促销' ?></td>
                                        <td class=" "><?= $value->ishot == 1 ? '热卖'  : '不热卖' ?></td>
                                        <td class=" "><?= $value->istui == 1 ? '推荐'  : '不推荐' ?></td>
                                        <td class=" "><?= $value->ison == 1  ? '上架' : '下架' ; ?></td>
                                        <td class=" "><?= date('Y-m-d H:i', $value->create_time); ?></td>
                                        <td class=" ">
                                            <a href="<?= \yii\helpers\Url::to(['edit','goods_id'=>$value->goods_id]) ?>" class="btn btn-primary btn-sm">编辑</a>
                                            <a href="<?= \yii\helpers\Url::to(['del','goods_id'=>$value->goods_id]) ?>" class="btn btn-success btn-sm">删除</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?=
                            LinkPager::widget([
                                'pagination' => $page,
                            ]);
                            ?>
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
