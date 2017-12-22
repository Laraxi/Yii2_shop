<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form validation <small>sub title</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                    <span class="section" style="color: red;">分类新增</span>
                    <?php if(Yii::$app->session->hasFlash('info')): ?>
                        <?= Yii::$app->session->getFlash('info'); ?>
                    <?php endif; ?>
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($model,'parent_id')->dropDownList($list); ?>
                    <?= $form->field($model,'title')->textInput(['placeholder'=>'请输入标题','class'=>'form-control']) ?>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <?= Html::submitButton('新增',['class'=>'btn btn-primary']) ?>
                            <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-success">返回</a>
                        </div>
                    </div>





                    <?php ActiveForm::end(); ?>



                </div>
            </div>
        </div>
        </div>
    </div>