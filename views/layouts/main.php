<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\FrontendAsset;
use yii\helpers\Url;

FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
<div class="layout doc-header fixed">
    <div class="layout doc-toper">
        <div class="container">
        </div>
    </div>
    <div class="container doc-naver">
        <div class="line">
            <div class="xs3 xm3 xb3 doc-logo">
                <button class="button icon-navicon margin-top float-right" data-target="#doc-header-pintuer"></button>
                <a href="/">
                    <img src="/imgs/logo.png" width="180" height="40" alt="拼图" class="ring-hover" />
                </a>
            </div>
            <div class="xl12 xs9 xm9 xb9 doc-nav">
                <ul class="nav nav-inline nav-navicon padding-small-top nav-menu" id="doc-header-pintuer">
                    <li><a href="/">首页</a> </li>
                    <li><a href="start.html">关于</a> </li>
                    <li><a href="css.html">加入我们</a> </li>
                    <li>
                        <a href="/react.html">商家<span class="arrow"></span></a>
                        <ul class="drop-menu">
                            <li><a href="<?=Url::toRoute('backup/index')?>">登录</a></li>
                            <li><a href="/weixin/index.html">我想合作</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">更多<span class="arrow"></span></a>
                        <ul class="drop-menu">
                            <li><a href="demo/index.html">演示</a></li>
                            <li><a href="case/index.html">案例</a></li>
                            <li><a href="jsplugins/index.html">插件</a></li>
                            <li><a href="tools/index.html">工具</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<hr />

<?= $content ?>

<div class="container padding-big-top padding-big-bottom">
    <div class="line">
        <div class="hidden-l xs1 xm1 xb1">

        </div>
        <div class="table-responsive padding hidden-l xs10 xm10 xb10">
            <ul class="nav nav-sitemap">
                <li><a href="#">新闻资讯</a>
                    <ul>
                        <li><a href="#">新闻公告</a> </li>
                        <li><a href="#">业界资讯</a> </li>
                        <li><a href="#">媒体报道</a> </li>
                    </ul>
                </li>
                <li><a href="#">产品中心</a>
                    <ul>
                        <li><a href="#">产品分类</a> </li>
                        <li><a href="#">产品品牌</a> </li>
                        <li><a href="#">产品特色</a> </li>
                    </ul>
                </li>
                <li><a href="#">技术反馈</a>
                    <ul>
                        <li><a href="#">售后服务</a> </li>
                        <li><a href="#">营销网络</a> </li>
                        <li><a href="#">服务支持</a> </li>
                    </ul>
                </li>
                <li><a href="#">留言反馈</a> </li>
                <li><a href="#">联系方式</a> </li>
            </ul>
        </div>
        <div class="hidden-l xs1 xm1 xb1">
        </div>
    </div>
    <div class="text-center">
        版权所有 © ichancer.com All Rights Reserved，图ICP备：</div>
</div>
<div class="doc-backtop win-backtop icon-arrow-circle-up">
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
