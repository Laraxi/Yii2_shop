<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\bootstrap\ActiveForm;
?>
<div class="site-index">


    <div class="row">
        <?php $form = ActiveForm::begin() ?>
        <?= $form->field($model,'title')->textInput() ?>
        <?= $form->field($model,'content')->widget('shiyang\umeditor\UMeditor', [
            'clientOptions' => [
                'initialFrameHeight' => 100,
                'toolbar' => [
                    'source | undo redo | bold |',
                    'link unlink | emotion image video |',
                    'justifyleft justifycenter justifyright justifyjustify |',
                    'insertorderedlist insertunorderedlist |' ,
                    'horizontal preview fullscreen',
                ],
            ]
        ])->label(false) ?>
        <?= \yii\helpers\Html::submitButton('新增',['class'=>'btn btn-primary']) ?>
        <?php ActiveForm::end() ?>
    </div>


</div>
