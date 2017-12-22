<?php

use yii\helpers\Html;

?>


<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>管理员新增 <small>sub title</small></h2>
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
                    <span class="section" style="color: red;">文章新增</span>
                    <?php if(Yii::$app->session->hasFlash('info')): ?>
                        <?= Yii::$app->session->getFlash('info'); ?>
                    <?php endif; ?>
                    <?= Html::beginForm('','post',['class'=>'form-horizontal form-label-left']) ?>
                        <div class="item form-group bad">
                            <?= Html::label('用户名<span class="required">*</span>','username',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) ?>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= Html::activeInput('text',$model,'username',['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"请输入用户"]) ?>
                            </div>
                                <div class="alert"><?= Html::error($model,'username') ?></div>
                        </div>


                    <div class="item form-group bad">
                        <?= Html::label('密码<span class="required">*</span>','password',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= Html::activePasswordInput($model,'password',['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"请输入密码"]) ?>
                        </div>
                        <div class="alert"><?= Html::error($model,'password') ?></div>
                    </div>

                    <div class="item form-group bad">
                        <?= Html::label('确认密码<span class="required">*</span>','repassword',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= Html::activePasswordInput($model,'repassword',['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"请输入确认密码"]) ?>
                        </div>
                        <div class="alert"><?= Html::error($model,'repassword') ?></div>
                    </div>

                    <div class="item form-group bad">
                        <?= Html::label('邮箱<span class="required">*</span>','email',['class'=>'control-label col-md-3 col-sm-3 col-xs-12']) ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?= Html::activeInput('text',$model,'email',['class'=>'form-control col-md-7 col-xs-12','placeholder'=>"请输入邮箱"]) ?>
                        </div>
                        <div class="alert"><?= Html::error($model,'email') ?></div>
                    </div>





                    <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <?= Html::submitButton('新增',['class'=>'btn btn-primary']) ?>
                                <a href="<?= \yii\helpers\Url::to(['index']) ?>" class="btn btn-success">返回</a>
                            </div>
                        </div>
                    <?= Html::endForm(); ?>
                </div>
            </div>
        </div>
        </div>
    </div>