<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form validation
                        <small>sub title</small>
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_title">
                    <h2>
                        <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-success">列表</a>
                        <a href="<?= \yii\helpers\Url::to(['add']) ?>" class="btn btn-success">新增</a>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <span class="section" style="color: red;">商品新增</span>
                    <?php if (Yii::$app->session->hasFlash('info')): ?>
                        <?= Yii::$app->session->getFlash('info'); ?>
                    <?php endif; ?>
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model, 'category_id')->dropDownList($list) ?>

                    <?= $form->field($model, 'title')->textInput(['placeholder' => '请输入商品名称', 'class' => 'form-control']) ?>

                    <?= $form->field($model, 'descr')->textInput(['placeholder' => '请输入商品描述', 'class' => 'form-control']) ?>

                    <?= $form->field($model, 'price')->textInput(['placeholder' => '请输入商品价格', 'class' => 'form-control']) ?>

                    <?= $form->field($model, 'sale_price')->textInput(['placeholder' => '请输入促销价格', 'class' => 'form-control']) ?>

                    <?= $form->field($model, 'ishot')->radioList([1 => '是', 0 => '否']) ?>

                    <?= $form->field($model, 'issale')->radioList([1 => '是', 0 => '否']) ?>

                    <?= $form->field($model, 'ison')->radioList([1 => '是', 0 => '否']) ?>

                    <?= $form->field($model, 'istui')->radioList([1 => '是', 0 => '否']) ?>

                    <?= $form->field($model, 'num')->textInput() ?>

                    <?= $form->field($model, 'goods_content')->widget('shiyang\umeditor\UMeditor', [
                        'clientOptions' => [
                            'initialFrameHeight' => 100,
                            'toolbar' => [
                                'source | undo redo | bold |',
                                'link unlink | emotion image video |',
                                'justifyleft justifycenter justifyright justifyjustify |',
                                'insertorderedlist insertunorderedlist |',
                                'horizontal preview fullscreen',
                            ],
                        ]
                    ])->label(false)
                    ?>
                    <?php if (!empty($model->cover)): ?>
                        <img src="http://<?php echo $model->cover; ?>-coversmall" alt="">
                    <?php endif; ?>
                    <?= $form->field($model, 'cover')->fileInput(['class' => 'form-control']) ?>
                    <?= $form->field($model, 'pics[]')->fileInput(['class' => 'form-control']) ?>
                    <?php foreach ((array)json_decode($model->pics, true) as $k => $pic): ?>
                        <img src="http://<?php echo $pic ?>-coversmall" alt="">
                        <a href="<?php echo yii\helpers\Url::to(['removepic', 'key' => $k, 'goods_id' => $model->goods_id]) ?>">删除</a>
                    <?php endforeach; ?>
                    <input class="col-sm-2" type='button' id="addpic" value='增加一个' style="float: right;"><br>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <?= Html::submitButton('新增', ['class' => 'btn btn-primary']) ?>
                            <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-success">返回</a>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>