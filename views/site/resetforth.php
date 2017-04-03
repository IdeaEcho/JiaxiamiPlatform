<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = '修改密码第四步：重置成功';
?>
<h4>
    <?= Html::encode($this->title) ?>
</h4>
<hr>
<div class="col-md-12">
        <span class="close rotate-hover"></span><strong>恭喜：</strong>操作成功。
        <a href="<?=Url::toRoute("site/index")?>">返回</a>
</div>
<script  src="/scripts/jquery-1.8.3.min.js"> </script>
