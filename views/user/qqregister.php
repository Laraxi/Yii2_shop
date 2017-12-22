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

                <div class="col-md-6">
                    <section class="section sign-in inner-right-xs">
                        <h2 class="bordered">
                            <span>
                                <img src="<?= Yii::$app->session['user_info']['figureurl_1'] ?>" alt="">
                            </span>
                            完善个人信息
                        </h2>


            <?php ActiveForm::begin([
                            'options'=>[
                                'class'=>'login-form cf-style-1'
                            ]
                        ]) ?>

                            <div class="field-row">
                                <div>昵称:<?= Yii::$app->session['user_info']['nickname'] ?>
                                </div>
                                <?= Html::label('用户名','username') ?>
                                <?= Html::activeInput('text',$model,'username',['class'=>'le-input']) ?>
                                <?= Html::error($model,'username',['class'=>'error']) ?>
                            </div><!-- /.field-row -->

                            <div class="field-row">
                                <?= Html::label('密码','password') ?>
                                <?= Html::activePasswordInput($model,'password',['class'=>'le-input']) ?>
                                <?= Html::error($model,'password',['class'=>'error']) ?>
                            </div><!-- /.field-row -->


                        <div class="field-row">
                            <?= Html::label('确认密码','repassword') ?>
                            <?= Html::activePasswordInput($model,'repassword',['class'=>'le-input']) ?>
                            <?= Html::error($model,'repassword',['class'=>'error']) ?>
                        </div><!-- /.field-row -->

                            <div class="field-row clearfix">
                            </div>

                            <div class="buttons-holder">
                                <?= Html::submitButton('完善个人信息',['class'=>'le-button huge']) ?>
                            </div><!-- /.buttons-holder -->
                        <?php ActiveForm::end();  ?>
                       <!-- /.cf-style-1 -->
                        
                       
                    </section><!-- /.sign-in -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main><!-- /.authentication -->
    <!-- ========================================= MAIN : END ========================================= -->		<!-- ============================================================= FOOTER ============================================================= -->
