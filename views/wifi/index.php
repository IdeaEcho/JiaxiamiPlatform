<?php
use app\assets\BackendhomeAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
BackendhomeAsset::register($this);
?>


<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="renderer" content="webkit">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="gray-bg">
    <?php $this->beginBody() ?>
    <?php $form = ActiveForm::begin([
        'id' => 'wifi-form',
        'action'=>\yii\helpers\Url::toRoute('wifi/editwifi'),
        'fieldConfig' => [
            'options'=>['class'=>null],
        ],
    ]); ?>
    <?= $form->field($model, 'wifi_ssid',
        ['template'=>"<div class=\"label\">{label}</div>\n<div>{input}</div>{error}"
        ])->textInput(['class'=>'input','placeholder'=>'wifi名'])->label("wifi")?>
    <?= $form->field($model, 'wifi_password',
        ['template'=>"<div class=\"label\">{label}</div>\n<div>{input}</div>{error}"
        ])->textInput(['class'=>'input','placeholder'=>'wifi密码'])->label("wifi密码")?>
    <?= Html::submitButton('修改', ['class' => 'button', 'name' => 'submit']) ?>
    <?php ActiveForm::end(); ?>

    <?php
    $js = <<<JS
    $(function(){
        $("#wifi-form").on('beforeSubmit',function(e){
            ajaxSubmitForm($(this),function(data){
                if(data.status==1){
                    getList();
                    $('#myDialog').modal('hide');
                }
            });
            return false;
        });
    });

JS;
    $this->registerJs($js);
    ?>


    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
