<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<h4>
    <?= Html::encode($this->title) ?>
</h4>
<hr>
<div class="col-md-12">
            <?php $form = ActiveForm::begin([
                'id' => 'register-form',
                'options' => ['class' => 'form form-block'],
                'fieldConfig' => [
                    'options'=>['class'=>null],
                ],
            ]); ?>
            <?= $form->field($model, 'phone',
                ['template'=>"<div class=\"input_1\">{input}<span>请输入您的手机号</span>{error}</div>"
                ])->textInput(['class'=>''])
            ?>
            <?= Html::button('发送验证码',['class' => 'default-btn','id'=> 'smsbutton'])?>
            <?= $form->field($model ,'smsVerifyCode',['template'=>"<div class=\"input_1\">{input}<span>请输入短信验证码</span>{error}</div>"
            ])->textInput(['class'=>''])->label(false) ?>
            <?= $form->field($model, 'password',
                ['template'=>"<div class=\"input_1\">{input}<span>请输入密码</span>{error}</div>"])->passwordInput(['class'=>''])?>
            <?= $form->field($model, 'verifyPassword',
                ['template'=>"<div class=\"input_1\">{input}<span>确认密码</span>{error}</div>"])->passwordInput(['class'=>'']) ?>
            <div class="form-button margin-small-bottom">
                    <?= Html::submitButton('同意以下协议并注册', ['class' => 'default-btn', 'name' => 'register-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
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
