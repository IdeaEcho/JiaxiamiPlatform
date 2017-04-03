<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '修改密码第一步：确认账号';
?>
<h4>
    <?= Html::encode($this->title) ?>
</h4>
<hr>
<div class="col-md-12">
        <div class="xl6 xs3 xm3 xb3 margin-large-top">
                <?php $form = ActiveForm::begin([
                    'id' => 'reset-form',
                    'options' => ['class' => 'form form-block'],
                ]); ?>

                <?= $form->field($model, 'phone',
                    ['template'=>"<div class=\"input_1\">{input}<span>请输入您的手机号</span>{error}</div>"
                    ])->textInput(['class'=>'']) ?>
                <?= $form->field($model, 'verifyCode') ->widget(Captcha::className(),
                    ['template'=>"<div class=\"img\">{image}</div><div class=\"input_1\">{input}<span>请输入验证码</span></div>",
                    'options' => ['class' => ''],
                ])->label(false)?>
                <?= Html::submitButton('确认', ['class' => 'default-btn', 'name' => 'register-button']) ?>

                <?php ActiveForm::end(); ?>
        </div>
</div>
