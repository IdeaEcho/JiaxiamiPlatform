<?php
namespace app\controllers;

use app\assets\BackendhomeAsset;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
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

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>菜单设置</h5>
                    </div>
                    <div class="ibox-content" data-list="<?= Url::toRoute('dishes/list') ?>" data-del="<?= Url::toRoute('dishes/del') ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myDialog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php
            $form = ActiveForm::begin([
                'id' => 'edit-form',
                'action' => Url::toRoute('dishes/edit'),
                'method' => "post",
            ]);
            ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                        <?= $form->field($model, 'dish_id', ['template' => '{label}<div class="col-md-6">{input}{hint}{error}</div>', 'labelOptions' => ['class' => 'control-label col-md-2']]) ?>
                        </div>
                    </div>
                    <!-- 菜名 -->
                    <div class="row">
                        <div class="col-md-8">
                        <?= $form->field($model, 'dish_name', ['template' => '{label}<div class="col-md-6">{input}{hint}{error}</div>', 'labelOptions' => ['class' => 'control-label col-md-2']]) ?>
                        </div>
                    </div>
                    <!-- 分类 -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-6">
                            <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map($typelist, 'type_id', 'type_name'))  ?>
                            </div>
                        </div>
                    </div>
                    <!-- 价格 -->
                    <div class="row">
                        <div class="col-md-8">
                            <?=$form->field($model,'dish_price',['template' => '{label}<div class="col-md-6">{input}{hint}{error}</div>', 'labelOptions' => ['class' => 'control-label col-md-2']])?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <?=$form->field($model,'acid',['template' => '{label}<div class="col-md-6">{input}{hint}{error}</div>', 'labelOptions' => ['class' => 'control-label col-md-2']])?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <?=$form->field($model,'sweet',['template' => '{label}<div class="col-md-6">{input}{hint}{error}</div>', 'labelOptions' => ['class' => 'control-label col-md-2']])?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <?=$form->field($model,'hot',['template' => '{label}<div class="col-md-6">{input}{hint}{error}</div>', 'labelOptions' => ['class' => 'control-label col-md-2']])?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <?=$form->field($model,'salty',['template' => '{label}<div class="col-md-6">{input}{hint}{error}</div>', 'labelOptions' => ['class' => 'control-label col-md-2']])?>
                        </div>
                    </div>
                    <!-- 图片 -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="col-md-6">
                            <?= $form->field($model, 'imageFile')->fileInput() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php
    $js = <<<JS
    $(function(){
        getList();

        $('#myDialog').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var data = button.data('data');
            var modal = $(this);
            $("#edit-form")[0].reset();//重置表单
            if(data=='add') {//新增
                modal.find('.modal-title').text("添加菜品");
                $("#dishes-dish_id").val('');
                $("#dishes-dish_name").val('');
                $("#dishes-type_id").val('');
                $("#dishes-dish_price").val('');
                $("#dishes-acid").val('');
                $("#dishes-sweet").val('');
                $("#dishes-hot").val('');
                $("#dishes-salty").val('');
            } else {//编辑
                modal.find('.modal-title').text("编辑菜品");
                data=eval(data);
                $("#dishes-dish_id").val(data.dish_id);
                $("#dishes-dish_name").val(data.dish_name);
                $("#dishes-type_id").val(data.type_id);
                $("#dishes-dish_price").val(data.dish_price);
                $("#dishes-acid").val(data.acid);
                $("#dishes-sweet").val(data.sweet);
                $("#dishes-hot").val(data.hot);
                $("#dishes-salty").val(data.salty);
            }
        });
        //表单提交
        $("#edit-form").on('beforeSubmit',function(e){
            $(this).ajaxSubmit({
                 type: $(this).attr('method'),
                 url:$(this).attr('action'),
                 beforeSend: function () {
                        //console.log("beforesend");
                        parent.layer.load(1, {shade: false});
                 },
                 complete: function () {
                        //console.log("complete");
                        parent.layer.closeAll('loading');
                 },
                 success:function(data) {
                        //console.log(data);
                        if (data.status == 1) {
                            parent.layer.alert(data.message, {icon: 6}, function (index) {
                                parent.layer.close(index);
                                getList();
                                $('#myDialog').modal('hide');
                            });
                        } else {
                            parent.layer.alert(data.message, {icon: 5}, function (index) {
                                parent.layer.close(index);
                            });
                        }
                 },
                 error:function(XmlHttpRequest, textStatus, errorThrown){
                        console.log("error");
                        console.log(XmlHttpRequest);
                        parent.layer.alert('出错了:' + textStatus + ' ' + errorThrown, {icon: 5});
                 }
            });
            return false;
        });
    });
    window.getList=function(){
       $.ajax({
        url: $(".ibox-content").data("list"),
        beforeSend: function () {
            parent.layer.load(2, {shade: false});
        },
        complete: function () {
            parent.layer.closeAll('loading');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            parent.layer.alert('出错啦:' + textStatus + ' ' + errorThrown, {icon: 5});
        },
        success: function (data) {
            $(".ibox-content").html(data);
        }
    });

   };
   window.del=function(id){
        parent.layer.confirm('确定删除?', function(index){
            parent.layer.close(index);
            $.ajax({
                url: $(".ibox-content").data("del"),
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
                    parent.layer.alert('出错啦:' + textStatus + ' ' + errorThrown, {icon: 5});
                },
                success: function (data) {
                    if(data.status == 1) {
                        parent.layer.alert(data.message, {icon: 6},function(index){
                            getList();
                            parent.layer.close(index);
                        });
                    } else {
                        parent.layer.alert(data.message, {icon: 5}, function (index) {
                            parent.layer.close(index);
                        });
                    }
                }
            });
        });
   };
JS;
    $this->registerJs($js);
    ?>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
