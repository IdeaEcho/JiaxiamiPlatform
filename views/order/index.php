<?php
namespace app\controllers;

use app\assets\BackendhomeAsset;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
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
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">月</span>
                        <h5>收入</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">40 886,200</h1>
                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i>
                        </div>
                        <small>总收入</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info pull-right">全年</span>
                        <h5>订单</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">275,800</h1>
                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i>
                        </div>
                        <small>新订单</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary pull-right">今天</span>
                        <h5>访客</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">106,120</h1>
                        <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i>
                        </div>
                        <small>新访客</small>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger pull-right">最近一个月</span>
                        <h5>活跃用户</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins">80,600</h1>
                        <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i>
                        </div>
                        <small>12月</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row" id= "newlist" data-list="<?= Url::toRoute('order/list')?>" data-cancel="<?= Url::toRoute('order/cancel')?>"
                 data-accept="<?= Url::toRoute('order/accept')?>" data-acceptall="<?= Url::toRoute('order/acceptall')?>"
                 data-finish="<?=Url::toRoute('order/finish')?>" data-finishall="<?= Url::toRoute('order/finishall')?>">

            </div>
        </div>

    </div>
    <input type="hidden" id="tempordercount" value="0"/>
    <audio id="orderAudio"><source src="/orderAudio.mp3" type="audio/mpeg"><source src="/orderAudio.wav" type="audio/wav"></audio>
    <?php
    $js = <<<JS
    $(function(){
        getNewList();
        var newlist=setInterval(getNewList,3000);
        $("#newlist").hover(function()
        {
            newlist = clearInterval(newlist);
            newlist = setInterval(getNewList,20000);
        }
        ,function()
        {
            newlist = clearInterval(newlist);
            newlist = setInterval(getNewList,3000);
        }
        );
        parent.toastr.options = {
      "closeButton": false,
      "debug": false,
      "positionClass": "toast-top-right",
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };
    });

    window.getNewList=function(){
       $.ajax({
        url: $("#newlist").data("list"),
        beforeSend: function () {
            //parent.layer.load(2, {shade: false});
        },
        complete: function () {
            //parent.layer.closeAll('loading');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            //parent.layer.alert('出错拉:' + textStatus + ' ' + errorThrown, {icon: 5});
        },
        success: function (data) {
            $("#newlist").html(data);
            $(".footable").footable();
            var ordercount=$("#ordercount").val();
            var tempordercount=$("#tempordercount").val();
            if(ordercount>tempordercount)
            {
                $('#orderAudio')[0].play();
                parent.toastr.success("新的订单来了");
            }
             $("#tempordercount").val(ordercount);

        }
    });

   };

   window.Cancel = function(id){
            parent.layer.confirm('确定拒绝接单吗?', function(index){
            parent.layer.close(index);
            $.ajax({
                url: $("#newlist").data("cancel"),
                data:{
                    id:id
                },
                beforeSend: function () {
                    parent.layer.load(2, {shade: false});
                },
                complete: function () {
                    parent.layer.closeAll('loading');
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    parent.layer.alert('出错拉:' + textStatus + ' ' + errorThrown, {icon: 5});
                },
                success: function (data) {
                    if(data.status == 1)
                    {
                        parent.layer.alert(data.message, {icon: 6},function(index){
                            getNewList();
                            parent.layer.close(index);
                        });
                    }
                    else
                    {
                        parent.layer.alert(data.message, {icon: 5}, function (index) {
                            parent.layer.close(index);
                        });
                    }
                }
            });
        });
   };
      window.finish = function(id){
            parent.layer.confirm('确定完成订单吗?', function(index){
            parent.layer.close(index);
            $.ajax({
                url: $("#newlist").data("finish"),
                data:{
                    id:id
                },
                beforeSend: function () {
                    parent.layer.load(2, {shade: false});
                },
                complete: function () {
                    parent.layer.closeAll('loading');
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    parent.layer.alert('出错拉:' + textStatus + ' ' + errorThrown, {icon: 5});
                },
                success: function (data) {
                    if(data.status == 1)
                    {
                        parent.layer.alert(data.message, {icon: 6},function(index){
                            getNewList();
                            parent.layer.close(index);
                        });
                    }
                    else
                    {
                        parent.layer.alert(data.message, {icon: 5}, function (index) {
                            parent.layer.close(index);
                        });
                    }
                }
            });
        });
   };
   window.finishall = function(id){
            parent.layer.confirm('确定完成全部订单吗?', function(index){
            parent.layer.close(index);
            $.ajax({
                url: $("#newlist").data("finishall"),
                beforeSend: function () {
                    parent.layer.load(2, {shade: false});
                },
                complete: function () {
                    parent.layer.closeAll('loading');
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    parent.layer.alert('出错拉:' + textStatus + ' ' + errorThrown, {icon: 5});
                },
                success: function (data) {
                    if(data.status == 1)
                    {
                        parent.layer.alert(data.message, {icon: 6},function(index){
                            getNewList();
                            parent.layer.close(index);
                        });
                    }
                    else
                    {
                        parent.layer.alert(data.message, {icon: 5}, function (index) {
                            parent.layer.close(index);
                        });
                    }
                }
            });
        });
   };
   window.accept =function(id){
            $.ajax({
                url: $("#newlist").data("accept"),
                data:{
                    id:id
                },
                beforeSend: function () {
                    parent.layer.load(2, {shade: false});
                },
                complete: function () {
                    parent.layer.closeAll('loading');
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    parent.layer.alert('出错拉:' + textStatus + ' ' + errorThrown, {icon: 5});
                },
                success: function (data) {
                    if(data.status == 1)
                    {
                        parent.layer.alert(data.message, {icon: 6},function(index){
                            getNewList();
                            parent.layer.close(index);
                        });
                    }
                    else
                    {
                        parent.layer.alert(data.message, {icon: 5}, function (index) {
                            parent.layer.close(index);
                        });
                    }
                }
        });
   };
      window.acceptall =function(){
            $.ajax({
                url: $("#newlist").data("acceptall"),
                beforeSend: function () {
                    parent.layer.load(2, {shade: false});
                },
                complete: function () {
                    parent.layer.closeAll('loading');
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    parent.layer.alert('出错拉:' + textStatus + ' ' + errorThrown, {icon: 5});
                },
                success: function (data) {
                    if(data.status == 1)
                    {
                        parent.layer.alert(data.message, {icon: 6},function(index){
                            getNewList();
                            parent.layer.close(index);
                        });
                    }
                    else
                    {
                        parent.layer.alert(data.message, {icon: 5}, function (index) {
                            parent.layer.close(index);
                        });
                    }
                }
        });
   };
JS;
    $this->registerJs($js);
    ?>



    <?php $this->endBody() ?>

    </body>
    </html>
<?php $this->endPage() ?>
