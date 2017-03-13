<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<h1>hello</h1>
<h2><?=$view_hello_str?></h2>

<h3><?=Html::encode($javascript)?></h3>
<h3><?=HtmlPurifier::process($javascript)?></h3>
