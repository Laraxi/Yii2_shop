<?php

use yii\helpers\Html;
use app\assets\AppAsset;
AppAsset::register($this);
AppAsset::addScript($this,'@web/js/test.js');
?>
<style>
    .error{
        color:red;
        font-size: 18px;
    }
</style>
<!-- ============================================================= HEADER : END ============================================================= -->		<!-- ========================================= MAIN ========================================= -->
    <main id="authentication" class="inner-bottom-md">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">登录</h2>
                        <p>欢迎您回来，请您输入您的账户名密码</p>

                        <div class="social-auth-buttons">
                            <div class="row">
                                <div class="col-md-6">
                                    <button class="btn-block btn-lg btn btn-facebook btn-qq"><i class="fa fa-qq"></i> 使用QQ账号登录</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-weibo"></i> 使用新浪微博账号登录</button>
                                </div>
                            </div>
                        </div>

                        <?= Html::beginForm(['user/auth'],'post',['class'=>'login-form cf-style-1']) ?>

                            <div class="field-row">
                                <?= Html::label('用户名/邮箱','username') ?>
                                <?= Html::activeInput('text',$model,'username',['class'=>'le-input']) ?>
                                <?= Html::error($model,'username',['class'=>'error']) ?>
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <?= Html::label('密码','password') ?>
                                <?= Html::activePasswordInput($model,'password',['class'=>'le-input']) ?>
                                <?= Html::error($model,'password',['class'=>'error']) ?>
                            </div><!-- /.field-row -->

                            <div class="field-row clearfix">
                        	<span class="pull-left">

                        		<label class="content-color">
                                    <?= Html::activeCheckbox($model,'remember',['class'=>'le-checbox auto-width inline']) ?>
                                </label>
                        	</span>
                                <span class="pull-right">
                        		<a href="#" class="content-color bold">忘记密码 ?</a>
                        	</span>
                            </div>

                            <div class="buttons-holder">
                                <?= Html::submitButton('安全登录',['class'=>'le-button huge']) ?>
                            </div><!-- /.buttons-holder -->
                        <?= Html::endForm(); ?>
                       <!-- /.cf-style-1 -->
                    </section><!-- /.sign-in -->
                </div><!-- /.col -->


                <div class="col-md-6">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">手机注册</h2>
                        <p>欢迎您回来，请您输入您的账户名密码</p>
                        <form action="<?= \yii\helpers\Url::to(['user/registerphone']) ?>" class="form-horizontal" id="shop-form">
                            <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                            <div class="form-group">
                                <label for="" class="control-label col-sm-2">手机号</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" placeholder="请输入手机号">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-sm-2">短信验证</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="phone_code" placeholder="点击右侧短信码">
                                </div>
                                <div class="col-sm-3">
                                    <div onclick=""  id="phone_code" style="border:1px solid #0099e9;height: 30px;line-height: 30px;text-align: center;">获取短信验证码</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-sm-2">密码</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" placeholder="请输入密码">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="control-label col-sm-2">确认密码</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="repassword" placeholder="再次输入密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="OnclickRegister"  type="button" class="btn btn-primary  col-sm-offset-2" value="注册">
                            </div>
                        </form>

                        <!-- /.cf-style-1 -->
                    </section><!-- /.sign-in -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
