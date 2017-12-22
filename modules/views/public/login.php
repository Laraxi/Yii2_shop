<?php
use yii\bootstrap\ActiveForm;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>Login</title>
    <link href="/admin/login/css/style.css" rel="stylesheet">
    <link href="/admin/login/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/admin/login/js/html5shiv.js"></script>
    <script src="/admin/login/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">
<div class="container">
    <?php $form = ActiveForm::begin([
        'fieldConfig'=>[
        ],
        'options'=>[
            'class'=>'form-signin'
        ]
    ])  ?>
      <div class="form-signin-heading text-center">
            <h1 class="sign-title">登陆</h1>
            <img src="/admin/login/images/login-logo.png" alt=""/>
        </div>
        <div class="login-wrap">
            <?= $form->field($model,'username')->textInput(['class'=>'form-control']) ?>
            <?= $form->field($model,'password')->passwordInput() ?>
            <?= \yii\helpers\Html::submitButton('登陆',['class'=>'btn  btn-login btn-block btn-sm']) ?>
            <label class="checkbox">
                <?= $form->field($model,'remember')->checkbox() ?>
            </label>
        </div>
    <?php ActiveForm::end() ?>
</div>
<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/admin/login/js/jquery-1.10.2.min.js"></script>
<script src="/admin/login/js/bootstrap.min.js"></script>
<script src="/admin/login/js/modernizr.min.js"></script>

</body>
</html>
