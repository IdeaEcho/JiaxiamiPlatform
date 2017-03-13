<?php

/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/3/11 0011
 * Time: 22:54
 */
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = '商家登录';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="panel">
        <div class="line">
            <div class="xl1 xs1 xm1 xb1">
            </div>

            <div class="margin-big xl10 xs10 xm10 xb10">
                <h1>
                    <?= Html::encode($this->title) ?>
                </h1>
                <hr>
                <div class="margin-big line-big">
                    <div class="xl12 xs6 xm6 xb6">

                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'form form-block'],
                            'fieldConfig' => [
//                                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                'options'=>['class'=>null],
                            ],
                        ]); ?>

                        <?= $form->field($model, 'phone',
                            ['template'=>"<div class=\"label\">{label}</div>\n<div class=\"field margin-small-bottom\">{input}</div>{error}"
                            ])->textInput(['class'=>'input','placeholder'=>'手机'])->label("账户名")?>
                        <?= $form->field($model, 'password',
                            ['template'=>"<div class=\"label\">{label}</div>\n<div class=\"field margin-small-bottom\">{input}</div>{error}"
                            ])->passwordInput(['class'=>'input','placeholder'=>'请输入密码']) ?>
                        <?= $form->field($model, 'verifyCode') ->widget(Captcha::className(),
                            ['template'=>"{image}<div class=\"field margin-small-bottom\">{input}</div>",
                                'options' => ['class' => 'input','placeholder'=>"验证码"],
                            ])->label(false) ?>
                        <div class="line">
                            <div class="xl3 xs3 xm3 xb3">
                                <a href="<?=Url::toRoute('site/resetfirst')?>">忘记密码?</a>
                            </div>
                            <div class="xl3 xs3 xm3 xb3 x6-move">
                                <a href="<?=Url::toRoute('site/register')?>">免费注册</a>
                            </div>
                        </div>

                        <?= $form->field($model, 'rememberMe',[
                            'template' => "{input}",'options' => ['class' => 'margin-small-top']
                        ])->checkbox()->label("记住密码") ?>

                        <div class="line">
                            <div class="x3 x4-move">
                                <div class="form-button margin-small-bottom">
                                    <?= Html::submitButton('登录', ['class' => 'button', 'name' => 'login-button']) ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>

                    </div>
                    <div class="hidden-l xs6 xm6 xb6">
                        <div class="x8 x2-move">
                            <img src="/imgs/codeScan.png"  width="100%" height="100%"class="img-responsive" alt="响应式图片" />
                        </div>
                    </div>

                </div>
            </div>
            <div class="xl1 xs1 xm1 xb1">
            </div>
        </div>
    </div>
</div>
