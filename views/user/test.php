<?php

use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);

AppAsset::addScript($this,'@web/js/test.js');

?>
<div class="container" >
<div class="row" style="margin: 50px;">
    <h6 style="font-size: 16px;font-weight: bold" class="col-sm-offset-3">免费注册</h6>
    <hr>
    <form action="" class="form-horizontal" id="shop-form">
        <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <div class="form-group">
            <label for="" class="control-label col-sm-2">手机号</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="phone" placeholder="请输入手机号">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="control-label col-sm-2">短信验证</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="phone_code" placeholder="点击右侧短信码">
            </div>
            <div class="col-sm-2">
                <div  id="phone_code" style="border:1px solid #0099e9;height: 30px;line-height: 30px;text-align: center;">获取短信验证码</div>
            </div>
        </div>

        <div class="form-group">
            <label for="" class="control-label col-sm-2">密码</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="password" placeholder="请输入密码">
            </div>
        </div>

        <div class="form-group">
            <label for="" class="control-label col-sm-2">确认密码</label>
            <div class="col-sm-5">
                <input type="password" class="form-control" name="repassword" placeholder="再次输入密码">
            </div>
        </div>
        <div class="form-group">
            <input id="button-add" type="button" class="btn btn-primary  col-sm-offset-2" value="注册">
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2">或使用其他账号登录：
                <img src="/images/register/qq.png" alt="">
                <img src="/images/register/weibo.png" alt="">
                <img src="/images/register/weixin.png" alt="">
            </div>
        </div>
    </form>
</div>
</div>
