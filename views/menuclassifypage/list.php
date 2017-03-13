<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/4/25 0025
 * Time: 20:29
 */
use yii\helpers\Html;
use yii\helpers\Json;
?>
<table class="table">
    <thead>
    <tr>
        <div class="ibox-create"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myDialog" data-data="add"><i class="glyphicon glyphicon-plus-sign"></i><span>添加菜品分类</span></a></div>

    </tr>
    <tr>
        <th>#</th>
        <th>菜品分类名称</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
        <?php $count=1;foreach ($model as $CoursesTypes){?>
            <tr>
                <td><?=$count++?></td>
                <td><?=Html::encode($CoursesTypes['type_name'])?></td>
                <td>
                    <a class="btn btn-info" href="#" data-toggle="modal" data-target="#myDialog" data-data='<?= Json::encode($CoursesTypes) ?>'>
                        <i class="glyphicon glyphicon-edit icon-white"></i>
                        编辑
                    </a>
                    <a class="btn btn-danger" href="javascript:void(0);" onclick="del(<?= $CoursesTypes['type_id'] ?>)">
                        <i class="glyphicon glyphicon-trash icon-white"></i>
                        删除
                    </a>
                </td>
            </tr>
        <?php }?>
    </tbody>
</table>
