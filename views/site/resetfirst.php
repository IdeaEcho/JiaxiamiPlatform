<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/3/19 0019
 * Time: 20:54
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '确认账号';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="step margin-large-top margin-big-bottom hidden-l">
        <div class="step-bar active" style="width: 25%;">
            <span class="step-point icon-check"></span><span class="step-text">第一步</span></span>
        </div>
        <div class="step-bar " style="width: 25%;">
            <span class="step-point">2</span><span class="step-text">第二步</span>
        </div>
        <div class="step-bar" style="width: 25%;">
            <span class="step-point">3</span><span class="step-text">第三步</span>
        </div>
        <div class="step-bar" style="width: 25%;">
            <span class="step-point">4</span><span class="step-text">第四步</span>
        </div>
    </div>
    <div class="line margin-large-top">
        <div class="xl2 xs4 xm4 xb4">
        </div>
        <div class="xl6 xs3 xm3 xb3 margin-large-top">
                <?php $form = ActiveForm::begin([
                    'id' => 'reset-form',
                    'options' => ['class' => 'form form-block'],
                ]); ?>

                <?= $form->field($model, 'phone',
                    ['template'=>"<div class=\"label\">{label}</div>\n<div class=\"field margin-small-bottom\">{input}</div>{error}"
                    ])->textInput(['class'=>'input','placeholder'=>'手机'])->label("账户名") ?>
                <?= $form->field($model, 'verifyCode') ->widget(Captcha::className(),
                    ['template'=>"{image}<div class=\"field margin-small-bottom\">{input}</div>",
                    'options' => ['class' => 'input','placeholder'=>"验证码"],
                ])->label(false)?>

            <div class="form-button margin-small-bottom">
                <?= Html::submitButton('确认', ['class' => 'button', 'name' => 'register-button']) ?>
            </div>

                <?php ActiveForm::end(); ?>
        </div>
        <div class="xl2 xs4 xm4 xb4">
        </div>
    </div>
</div>