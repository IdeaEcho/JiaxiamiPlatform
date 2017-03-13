<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/5/13 0013
 * Time: 18:25
 */
use yii\widgets\ActiveForm;
use app\assets\BackendhomeAsset;
use yii\helpers\Url;
use yii\helpers\Html;
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

<?php $form = ActiveForm::begin(
    [   'id' => 'edit-form',
        'action' => Url::toRoute('test/edit'),
        'method' => "post",
        'options' => ['enctype' => 'multipart/form-data']
    ]) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?= $form->field($model, 'username')->textInput()?>
    <?= $form->field($model, 'password')->passwordInput()?>
<?= Html::submitButton('保存', ['class' => 'btn btn-primary','id'=>'ajaxSubmit']) ?>

<?php ActiveForm::end() ?>

<?php

$js = <<<JS
    $(function(){
        $("#edit-form").on('beforeSubmit',function(e){
            $(this).ajaxSubmit({
                 type: $(this).attr('method'),
                 url:$(this).attr('action'),
                 success:function(data){
                        console.log(data);
                 },
                 error:function(XmlHttpRequest,textStatus,errorThrown){
                        console.log(XmlHttpRequest);
                        console.log(textStatus);
                        console.log(errorThrown);
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
