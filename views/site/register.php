<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/3/13 0013
 * Time: 20:41
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <div class="line">
        <div class="xl2 xs1 xm1 xb1">
        </div>
        <div class="xl8 xs4 xm4 xb4">
            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'options' => ['class' => 'form form-block'],
                'fieldConfig' => [
                    'options'=>['class'=>null],
                ],
            ]); ?>

            <?= $form->field($model, 'phone',
                ['template'=>"<div class=\"label\">{label}</div>\n<div class=\"field margin-small-bottom\">{input}</div>{error}"
                ])->textInput(['class'=>'input','placeholder'=>'手机'])->label("账户名")
            ?>
            <div class="form-button margin-small-bottom">
            <?= Html::button('发送验证码',['class' => 'button','id'=> 'smsbutton'])?>
            </div>
            <?= $form->field($model ,'smsVerifyCode',['template'=>"<div class=\"label\">{label}</div>\n<div class=\"field margin-small-bottom\">{input}</div>{error}"
            ])->textInput(['class'=>'input','placeholder'=>'短信验证码'])->label(false) ?>
            <?= $form->field($model, 'password',
                ['template'=>"<div class=\"label\">{label}</div>\n<div class=\"field margin-small-bottom\">{input}</div>{error}"
                ])->passwordInput(['class'=>'input','placeholder'=>'请输入密码'])?>
            <?= $form->field($model, 'verifyPassword',
                ['template'=>"<div class=\"label\">{label}</div>\n<div class=\"field margin-small-bottom\">{input}</div>{error}"
                ])->passwordInput(['class'=>'input','placeholder'=>'确认密码']) ?>
            <div class="form-button margin-small-bottom">
                    <?= Html::submitButton('同意以下协议并注册', ['class' => 'button', 'name' => 'register-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
    $js = <<<JS
    var count = 10;
    var myCountDown;
    $(function(){
       $("#smsbutton").click(function(){
            if($("#merchantuserset-phone").val().match(/^1[0-9]{10}$/))
            {
                postmsm();
                myCountDown = setInterval(countDown,1000);
            }


       });

    });
    function postmsm(){
            //alert($("#merchantuser-phone").val());
            $.post("/index.php/site/sms.html",
                {num:$("#merchantuserset-phone").val()},
                function(data){
                    $("#merchantuserset-smsverifycode").val(data);
                }
            );
            //alert();
    }
    function countDown(){
       count--;
       $("#smsbutton").attr("disabled",true);
       $("#smsbutton").text("请稍等 "+ count +" 秒！");
       if(count==0){
           $("#smsbutton").text("发送到手机").removeAttr("disabled");
           clearInterval(myCountDown);
           count = 10;
            }
    }

JS;
    $this->registerJs($js);
?>



