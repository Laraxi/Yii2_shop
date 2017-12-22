<!-- ============================================================= HEADER : END ============================================================= -->
<div id="single-product">
    <div class="container" style="padding-top:10px">
        <?php foreach ($orders as $order): ?>
            <div style="margin-bottom:30px;">
                <div class="trade-order-mainClose">
                    <div>
                        <table style="width:100%;border-collapse:collapse;border-spacing:0px;">
                            <colgroup>
                                <col style="width:38%;">
                                <col style="width:10%;">
                                <col style="width:5%;">
                                <col style="width:12%;">
                                <col style="width:12%;">
                                <col style="width:11%;">
                                <col style="width:12%;">
                            </colgroup>
                            <tbody>
                            <tr style="background-color:#F5F5F5;width:100%">
                                <td style="padding:10px 20px;text-align:left;">
                                    <label>
                                        <input type="checkbox" disabled="" style="margin-right:8px;">
                                        <strong title="2016-02-17 15:55:26" style="margin-right:8px;font-weight:bold;">
                                            <?= date('y-m-d H:i:s', $order->create_time) ?>
                                        </strong>
                                    </label>
                                    <span>订单号：</span>
                                    <span><?= $order->order_id ?></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table style="width:100%;border-collapse:collapse;border-spacing:0px;">
                            <colgroup>
                                <col style="width:38%;">
                                <col style="width:10%;">
                                <col style="width:5%;">
                                <col style="width:12%;">
                                <col style="width:12%;">
                                <col style="width:11%;">
                                <col style="width:12%;">
                            </colgroup>
                            <tbody>
                            <?php $i=1;  ?>
                            <?php foreach ($order->goodsData as $value): ?>
                                <tr>
                                    <td style="text-align:left;vertical-align:top;padding-top:10px;padding-bottom:10px;border-right-width:0;border-right-style:solid;border-right-color:#E8E8E8;border-top-width:0;border-top-style:solid;border-top-color:#E8E8E8;padding-left:20px;">
                                        <div style="overflow:hidden;">
                                            <a class="tp-tag-a" href="<?= \yii\helpers\Url::to(['goods/detail','goods_id'=>$value->goods_id]) ?>"
                                               style="float:left;width:27%;margin-right:2%;text-align:center;"
                                               target="_blank">
                                                <img src="http://<?= $value->cover ?>-coversmall"
                                                     style="border:1px solid #E8E8E8;max-width:80px;">
                                            </a>
                                            <div style="float:left;width:71%;word-wrap:break-word;">
                                                <div style="margin:0px;">
                                                    <a class="tp-tag-a" href="<?= \yii\helpers\Url::to(['goods/detail','goods_id'=>$value->goods_id]) ?>"
                                                       target="_blank"><span><?= $value->title ?></span></a><span></span>
                                                </div>
                                                <div style="margin-top:8px;margin-bottom:0;color:#9C9C9C;">
                                                    <span
                                                        style="margin-right:6px;"><span>颜色分类</span><span>：</span><span><?= $value->cate_name ?></span></span>
                                                </div>
                                                <span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;vertical-align:top;padding-top:10px;padding-bottom:10px;border-right-width:0;border-right-style:solid;border-right-color:#E8E8E8;border-top-width:0;border-top-style:solid;border-top-color:#E8E8E8;">
                                        <div style="font-family:verdana;font-style:normal;">
                                            <?php if ($value->issale): ?>
                                                <p>
                                                    <del style="color:#9C9C9C;">
                                                        <?php echo $value->price ?>
                                                    </del>
                                                </p>
                                                <p>
                                                    <?php echo $value->sale_price ?>
                                                </p>
                                            <?php else: ?>
                                                <p>
                                                    <?= $value->price ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td style="text-align:center;vertical-align:top;padding-top:10px;padding-bottom:10px;border-right-width:0;border-right-style:solid;border-right-color:#E8E8E8;border-top-width:0;border-top-style:solid;border-top-color:#E8E8E8;">
                                        <div>
                                            <div>
                                                <?= $value->num ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;vertical-align:top;padding-top:10px;padding-bottom:10px;border-right-width:1px;border-right-style:solid;border-right-color:#E8E8E8;border-top-width:0;border-top-style:solid;border-top-color:#E8E8E8;">
                                        <div>
                                            <div style="margin-bottom:3px;">
                                                <span><span class="trade-ajax"><span
                                                            class="trade-tooltip-wrap"><span><span
                                                                    class="trade-operate-text"><?= Yii::$app->session['user_name'] ?></span></span></span><noscript></noscript></span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <?php if($i == 1) :?>
                                    <td style="text-align:center;vertical-align:top;padding-top:10px;padding-bottom:10px;border-right-width:1px;border-right-style:solid;border-right-color:#E8E8E8;border-top-width:0;border-top-style:solid;border-top-color:#E8E8E8;">
                                        <div>
                                            <div style="font-family:verdana;font-style:normal;">
                                                <span></span><span></span>
                                                <p><strong><?= $order->amount ?></strong></p><span></span>
                                            </div>
                                            <p>
                                                <span>(含运费：</span><span><?= Yii::$app->params['expressPrice'][$order->express_id] ?></span><span></span><span></span><span>)</span>
                                            </p>
                                            <div>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="text-align:center;vertical-align:top;padding-top:10px;padding-bottom:10px;border-right-width:1px;border-right-style:solid;border-right-color:#E8E8E8;border-top-width:0;border-top-style:solid;border-top-color:#E8E8E8;">
                                        <div>
                                        <div style="margin-bottom:3px;">
                                                <a class="tp-tag-a" href="<?= \yii\helpers\Url::to(['order/check','order_id'=>$order->order_id]) ?>" target="_blank">
                                                    <?= $order->pay_status ?>
                                                </a>
                                            </div>
                                            <div>
                                                <div style="margin-bottom:3px;">

                                                    <?php if($order->status == 220): ?>
                                                    <span>
                                                        <a class="tp-tag-a" href="<?php echo yii\helpers\Url::to(['order/received', 'order_id' => $order->order_id]) ?>" target="_blank">
                                                        <span class="trade-operate-text">
                                                          确认收货
                                                        </span>
                                                        <div class="expressshow" style="overflow:auto;text-align:left;font-size:12px;width:200px;height:300px;position:absolute;border:1px solid #ccc;padding:15px;background-color:#eee">快递状态</div>
                                                        </a>
                                                    </span>
                                                    <span>
                                                        <a data="<?= $order->express_no ?>" class="tp-tag-a express" href="" target="_blank">
                                                            <span class="trade-operate-text">查看物流</span>
                                                            <div class="expressshow" style="overflow:auto;text-align:left;font-size:12px;width:200px;height:300px;position:absolute;border:1px solid #ccc;padding:15px;background-color:#eee">快递状态</div>
                                                        </a>
                                                    </span>

                                                    <?php endif; ?>

                                                    <?php else: ?>
                                    <td style="text-align:center;vertical-align:top;padding-top:10px;padding-bottom:10px;border-right-width:1px;border-right-style:solid;border-right-color:#E8E8E8;border-top-width:0;border-top-style:solid;border-top-color:#E8E8E8;"></td>
                                    <td style="text-align:center;vertical-align:top;padding-top:10px;padding-bottom:10px;border-right-width:1px;border-right-style:solid;border-right-color:#E8E8E8;border-top-width:0;border-top-style:solid;border-top-color:#E8E8E8;"></td>
                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>