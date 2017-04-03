<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '修改密码第三步：重置密码';
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
            <div class="margin-small-top margin-small-bottom">
                <strong >
                    <?=Html::label($displayphone)?>
                </strong>
            </div>
            <?= $form->field($model, 'password',
                ['template'=>"<div class=\"input_1\">{input}<span>请输入密码</span>{error}</div>"
                ])->passwordInput(['class'=>'']) ?>

            <?= $form->field($model, 'verifyPassword',
                ['template'=>"<div class=\"input_1\">{input}<span>请确认密码</span>{error}</div>"
                ])->passwordInput(['class'=>'']) ?>
            <div class="form-button margin-small-bottom">
                <?= Html::submitButton('确认', ['class' => 'default-btn', 'name' => 'reset-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
</div>
