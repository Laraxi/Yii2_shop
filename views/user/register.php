<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


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

                <div class="col-md-12">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">注册</h2>
                        <?php $form = ActiveForm::begin();?>
                        <?= $form->field($model,'username')->textInput(['placeholder'=>'请输入用户名']) ?>
                        <?= $form->field($model,'password')->passwordInput(['placeholder'=>'请输入密码']) ?>
                        <?= $form->field($model,'repassword')->passwordInput(['placeholder'=>'请输入确认密码']) ?>
                        <?= Html::submitButton('注册',['class'=>'btn btn-primary']) ?>
                        <?php ActiveForm::end(); ?>

                    </section><!-- /.sign-in -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->