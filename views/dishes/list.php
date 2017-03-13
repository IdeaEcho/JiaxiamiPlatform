<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/5/6 0006
 * Time: 11:03
 */
use yii\helpers\Html;
use yii\helpers\Json;
?>
<table class="table">
    <thead>
    <tr>
        <div class="ibox-create"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myDialog" data-data="add"><i class="glyphicon glyphicon-plus-sign"></i><span>添加菜品分类</span></a></div>
    </tr>
    <tr class="row">
        <th class="col-xs-1 col-md-1">#</th>
        <th class="col-xs-1 col-md-1"></th>
        <th class="col-xs-2 col-md-2">菜品名称</th>
        <th>价格</th>
        <th>销量</th>
        <th>评分</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php $count=1; foreach ($model as $dishes){?>
        <tr class="row">
            <td class="col-xs-1 col-md-1"><?=$count++?></td>
            <td class="col-xs-1 col-md-1"><a href="#" class="thumbnail"><img class="img-responsive" alt="Responsive image" src="<?=$dishes['dish_photo']?>" ></a></td>
            <td class="col-xs-2 col-md-2"><?=Html::encode($dishes['dish_name'])?></td>
            <td><?=Html::encode($dishes['dish_price'])?></td>
            <td><?=Html::encode($dishes['dish_sales'])?></td>
            <td><?=Html::encode($dishes['dish_grade'])?></td>
            <td>
                <a class="btn btn-info" href="#" data-toggle="modal" data-target="#myDialog" data-data='<?= Json::encode($dishes) ?>'>
                    <i class="glyphicon glyphicon-edit icon-white"></i>
                    编辑
                </a>
                <a class="btn btn-danger" href="javascript:void(0);" onclick="del(<?= $dishes['dish_id'] ?>)">
                    <i class="glyphicon glyphicon-trash icon-white"></i>
                    删除
                </a>
            </td>
        </tr>
    <?php }?>
    </tbody>
</table>