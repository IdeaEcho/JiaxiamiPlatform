<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/3/19 0019
 * Time: 23:09
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '修改密码第二步：验证手机';
?>
<h4>
    <?= Html::encode($this->title) ?>
</h4>
<hr>
<div class="col-md-12">

    <?php $form = ActiveForm::begin([
    'id' => 'reset-form',
    'options' => ['class' => 'form form-block'],
    ]); ?>
    <div class="margin-small-top margin-small-bottom">
        <strong >
        <?=Html::label($displayphone)?>
        </strong>
    </div>
    <?= Html::button('发送验证码',['class' => 'default-btn','id'=> 'smsbutton'])?>
    <?= $form->field($model ,'resetSmsVerify',
    ['template'=>"<div class=\"input_1\">{input}<span>请输入短信验证码</span>{error}</div>"
    ])->textInput(['class'=>''])->label(false) ?>
    <div class="form-button margin-small-bottom">
    <?= Html::submitButton('确认', ['class' => 'default-btn', 'name' => 'reset-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
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
