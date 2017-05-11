<?php
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
    <div class="modal-header">
        <h4 class="modal-title">店铺资料修改</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'imageFile')->fileInput() ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'username')->textInput()?>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?= Html::submitButton('保存', ['class' => 'btn btn-primary','id'=>'ajaxSubmit']) ?>
    </div>
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
                        if (data.status == 1) {
                            parent.layer.alert(data.message, {icon: 6}, function (index) {
                                location.reload();
                                parent.layer.close(index);
                            });
                        } else {
                            parent.layer.alert(data.message, {icon: 5}, function (index) {
                                parent.layer.close(index);
                            });
                        }
                 },
                 error:function(XmlHttpRequest,textStatus,errorThrown){
                     console.log(XmlHttpRequest);
                     console.log(textStatus);
                     console.log(errorThrown);
                     parent.layer.alert('出错啦:' + textStatus + ' ' + errorThrown, {icon: 5});
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
