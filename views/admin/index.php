<?php
namespace app\controllers;

use Yii;
use app\assets\BackendindexAsset;
use yii\helpers\Html;
use yii\helpers\Url;
BackendindexAsset::register($this);
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
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<?php $this->beginBody() ?>
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <span><img alt="image" class="img-circle"  height="50" width="50" src="/uploads/logo.png" /></span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                               <span class="block m-t-xs"><strong class="font-bold"><?=Yii::$app->user->identity->nickname?></strong></span>
                                <span class="text-muted text-xs block"><?=Yii::$app->user->identity->phone?><b class="caret"></b></span>
                                </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li>
                                <a class="J_menuItem" href="changepwd.html">修改密码</a>
                            </li>
                            <li>
                                <a class="J_menuItem" href="profile.html">个人资料</a>
                            </li>
                            <!-- <li class="divider"></li>
                            <li><a href="">安全退出</a>
                            </li> -->
                        </ul>
                    </div>
                    <div class="logo-element">夹虾米</div>
                </li>
                <li>
                    <a class="J_menuItem" href="<?=url::toRoute("order/index")?>" data-index="0"><i class="fa fa-columns"></i> <span class="nav-label">首页</span></a>
                </li>
                <li>
                    <a class="J_menuItem" href="<?=url::toRoute("order/historyindex")?>" data-index="0"><i class="fa fa-copy"></i> <span class="nav-label">历史订单</span></a>
                </li>
                <li>
                    <a class="J_menuItem" href="<?=url::toRoute("menuclassifypage/index")?>"><i class="fa fa-list-ol"></i> <span class="nav-label">菜品分类</span></a>
                </li>
                <li>
                    <a class="J_menuItem" href="<?=url::toRoute("dishes/index")?>"><i class="fa fa-list-alt"></i> <span class="nav-label">菜品</span></a>
                </li>
                <li>
                    <a class="J_menuItem" href="<?=url::toRoute("qrcode/index")?>"><i class="fa fa-clipboard"></i> <span class="nav-label">桌号标签</span></a>
                </li>
                <!-- <li>
                    <a class="J_menuItem" href="<?=url::toRoute("wifi/index")?>"><i class="fa fa-clipboard"></i> <span class="nav-label">wifi设置</span></a>
                </li> -->
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row content-tabs">
            <button class="roll-nav roll-left J_tabLeft"><i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="<?=url::toRoute("order/index")?>">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭操作<span class="caret"></span>

                </button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
            <a href="<?=Url::toRoute("/site/logout")?>" class="roll-nav roll-right J_tabExit"><i class="fa fa fa-sign-out"></i> 退出</a>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?=url::toRoute("order/index")?>" frameborder="0" data-id="<?=url::toRoute("order/index")?>" seamless></iframe>
        </div>
    </div>
</div>
<!--<script language=JavaScript>-->
<!--    parent.location.reload();-->
<!--</script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
