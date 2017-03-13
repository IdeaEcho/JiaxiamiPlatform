<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/4/2 0002
 * Time: 14:06
 */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = '重置成功';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="step margin-large-top margin-big-bottom hidden-l">
        <div class="step-bar complete" style="width: 25%;">
            <span class="step-point icon-check"></span><span class="step-text">第一步</span></span>
        </div>
        <div class="step-bar complete" style="width: 25%;">
            <span class="step-point active">2</span><span class="step-text">第二步</span>
        </div>
        <div class="step-bar complete" style="width: 25%;">
            <span class="step-point">3</span><span class="step-text">第三步</span>
        </div>
        <div class="step-bar active" style="width: 25%;">
            <span class="step-point">4</span><span class="step-text">第四步</span>
        </div>
    </div>
    <div class="line margin-large-top">
        <div class="xl2 xs4 xm4 xb4">
        </div>
        <div class="xl6 xs3 xm3 xb3 margin-large-top">
            <div class="alert alert-green">
                <span class="close rotate-hover"></span><strong>恭喜：</strong>操作成功。
                <a href="<?=Url::toRoute("site/index")?>">返回</a>
            </div>
        </div>
        <div class="xl2 xs4 xm4 xb4">
        </div>
    </div>
</div>