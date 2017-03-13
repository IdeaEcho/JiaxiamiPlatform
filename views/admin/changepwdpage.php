<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/3/11 0011
 * Time: 22:54
 */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use app\assets\BackendindexAsset;
BackendindexAsset::register($this);
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
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



<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'changepwd-form',
        'action'=> Url::toRoute('admin/changepwd'),
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'password')->passwordInput()->label("旧密码")?>
    <?= $form->field($model, 'newPassword')->passwordInput() ?>
    <?= $form->field($model, 'verifyNewPassword')->passwordInput()->label("确认密码")?>
    <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>


<?php
$js=<<<JS
    $("#changepwd-form").on('beforeSubmit',function(e){
        ajaxSubmitForm($(this));
        return false;
    });
JS;
$this->registerJs($js);
?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>



