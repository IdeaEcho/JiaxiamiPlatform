<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/5/18 0018
 * Time: 12:47
 */
namespace app\controllers;

use app\assets\BackendhomeAsset;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
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
<form action="<?=Url::toRoute('qrcode/download')?>" method="post" id="edit-form" >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">桌号二维码下载</h4>
    </div>
    <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-8">
                <input type="number" name="low_number"/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <input type="number" name="high_number"/>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <?= Html::submitButton('下载', ['class' => 'btn btn-primary']) ?>
    </div>
</form>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
