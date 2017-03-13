<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/3/19 0019
 * Time: 23:09
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '验证手机';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container">
        <div class="step margin-large-top margin-big-bottom hidden-l">
            <div class="step-bar complete" style="width: 25%;">
                <span class="step-point icon-check"></span><span class="step-text">第一步</span></span>
            </div>
            <div class="step-bar active" style="width: 25%;">
                <span class="step-point active">2</span><span class="step-text">第二步</span>
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
                <div class="margin-small-top margin-small-bottom">
                <strong >
                    <?=Html::label($displayphone)?>
                </strong>
                </div>
                <div class="form-button margin-small-bottom">
                <?= Html::button('发送验证码',['class' => 'button','id'=> 'smsbutton'])?>
                </div>
                <?= $form->field($model ,'resetSmsVerify',
                    ['template'=>"<div class=\"label\">{label}</div>\n<div class=\"field margin-small-bottom\">{input}</div>{error}"
                    ])->textInput(['class'=>'input','placeholder'=>'短信验证码'])->label(false) ?>
                <div class="form-button margin-small-bottom">
                    <?= Html::submitButton('确认', ['class' => 'button', 'name' => 'reset-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
            <div class="xl2 xs4 xm4 xb4">
            </div>
        </div>
    </div>

<?php
$js = <<<JS
    var count = 60;
    var myCountDown;
    $(function(){
       $("#smsbutton").click(function(){
                postmsm();
                myCountDown = setInterval(countDown,1000);
       });

    });
    function postmsm(){
            $.post("/index.php/site/resetpawsms.html",null
                ,
                function(data){
                    $("#merchantuserset-resetsmsverify").val(data);
                }
            );
    }
    function countDown(){
       count--;
       $("#smsbutton").attr("disabled",true);
       $("#smsbutton").text("请稍等 "+ count +" 秒！");
       if(count==0){
           $("#smsbutton").text("发送到手机").removeAttr("disabled");
           clearInterval(myCountDown);
           count = 60;
            }
    }

JS;
$this->registerJs($js);
?>