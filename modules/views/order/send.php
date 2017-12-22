<?php
use yii\helpers\Html;
?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title btn btn-success">
                    发货
                </div>
                <div class="x_content">
                    <div id="example_wrapper" class="dataTables_wrapper" role="grid">
                        <?= Html::beginForm('','post',['class'=>'form-horizontal']) ?>

                        <div class="form-group">
                            <?= Html::label('快递编号','express_no',['class'=>'col-sm-2']) ?>
                            <div class="col-sm-5">
                                <?= Html::error($model,'express_no') ?>
                                <?= Html::activeInput('text',$model,'express_no') ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <?= Html::submitButton('发货',['class'=>'btn btn-success']) ?>
                            </div>
                        </div>
                        <?= Html::endForm();?>
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
