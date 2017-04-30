<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/4/24 0024
 * Time: 17:12
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

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>菜品分类</h5>
                    </div>
                    <div class="ibox-content" data-list="<?= Url::toRoute('menuclassifypage/classifylist') ?>" data-del="<?= Url::toRoute('menuclassifypage/classifydel') ?>">
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
                'action' => Url::toRoute('menuclassifypage/classifyedit')
            ]);
            ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                    <?= $form->field($model, 'type_name', ['template' => '{label}<div class="col-md-6">{input}{hint}{error}</div>', 'labelOptions' => ['class' => 'control-label col-md-2']]) ?>
                    <?= $form->field($model, 'type_id')->hiddenInput()->label(false) ?>
                    </div>
                    <div class="row">
                        <label class="control-label  col-md-2">优惠设置</label>
                        <label class="checkbox-inline">
                            <?=$form->field($model,'privilegeA')->checkbox()->label('去零头') ?>
                        </label>
                        <label class="checkbox-inline">
                            <?=$form->field($model,'privilegeB')->checkbox()->label('满减') ?>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="col-md-6">
                                <?=$form->field($model,'privilegeB_lower')->label("满")?>
                            </div>
                            <div class="col-md-6">
                                <?=$form->field($model,'privilegeB_upper')->label("减")?>
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
            if(data=='add')
            {
                modal.find('.modal-title').text("添加菜品分类");
                $("#coursestypes-type_id").val('');
                //$("#coursestypes-type_name").val('');
                //$("#doctor-enabled").prop('checked',true);
            }
            else
            {
                modal.find('.modal-title').text("编辑菜品分类");
                data=eval(data);
                console.log(data);
                $("#coursestypes-type_id").val(data.type_id);
                $("#coursestypes-type_name").val(data.type_name);
                var jsondata = $.parseJSON(data.privilege);
                console.log(jsondata);
                $("#coursestypes-privilegea").prop('checked',jsondata.privilegeA==1?true:false);
                if(jsondata.privilegeB == 1)
                {
                    $("#coursestypes-privilegeb").prop('checked',true);
                    $("#coursestypes-privilegeb_lower").val(jsondata.privilegeB_lower);
                    $("#coursestypes-privilegeb_upper").val(jsondata.privilegeB_upper);
                }
                //$("#doctor-enabled").prop('checked',data.enabled==1?true:false);
            }
        });
        $("#edit-form").on('beforeSubmit',function(e){
            ajaxSubmitForm($(this),function(data){
                if(data.status==1){
                    getList();
                    $('#myDialog').modal('hide');
                }
            });
            return false;
        });
    });
   window.getList=function(){
       $.ajax({
        url: $(".ibox-content").data("list"),
        beforeSend: function () {
            //console.log("load");
            parent.layer.load(2, {shade: false});
        },
        complete: function () {
            //console.log("close load");
            parent.layer.closeAll('loading');
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            parent.layer.alert('出错啦:' + textStatus + ' ' + errorThrown, {icon: 5});
        },
        success: function (data) {
            //console.log("load success");
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
                    if(data.status == 1)
                    {
                        parent.layer.alert(data.message, {icon: 6},function(index){
                            getList();
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
JS;
    $this->registerJs($js);
    ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
