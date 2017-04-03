<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '商家登录';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h4>
        <?= Html::encode($this->title) ?>
    </h4>
    <hr>
<div class="col-md-12">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form form-block']
        ]); ?>
        <?= $form->field($model, 'phone',
            ['template'=>"<div class=\"input_1\">{input}<span>请输入您的手机号</span>{error}</div>"
            ])->textInput(['class'=>''])?>
        <?= $form->field($model, 'password',
            ['template'=>"<div class=\"input_1\">{input}<span>请输入您的密码</span>{error}</div>"
            ])->passwordInput(['class'=>'']) ?>
        <?= $form->field($model, 'verifyCode') ->widget(Captcha::className(),
            ['template'=>"<div class=\"img\">{image}</div><div class=\"input_1\">{input}<span>请输入验证码</span></div>",
                'options' => ['class' => ''],
            ])->label(false) ?>
            <?= $form->field($model, 'rememberMe',['template' => "{input}"])->checkbox()->label("记住密码") ?>
            <div class="line">
                    <?= Html::submitButton('登录', ['class' => 'default-btn', 'name' => 'login-button']) ?>
                    <a class="default-btn" href="<?=Url::toRoute('site/resetfirst')?>">忘记密码?</a>
                    <a class="default-btn" href="<?=Url::toRoute('site/register')?>">免费注册</a>
            </div>
        <?php ActiveForm::end(); ?>
</div>
