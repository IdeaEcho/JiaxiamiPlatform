<?php
use yii\helpers\Html;
use yii\helpers\Json;
?>
<table class="table">
    <thead>
    <tr class="row">
        <th class="col-xs-1 col-md-1">#</th>
        <th class="col-xs-1 col-md-1">订单号</th>
        <th class="col-xs-1 col-md-1">时间</th>
        <th class="col-xs-2 col-md-2">桌号</th>
        <th>菜品和数量</th>
        <th>用户手机号</th>
        <th>原价</th>
        <th>现价</th>
        <th>状态</th>
    </tr>
    </thead>
    <tbody>
    <?php $count=1; foreach ($model as $order){?>
        <tr class="row">
            <td class="col-xs-1 col-md-1"><?=$count++?></td>
            <td class="col-xs-1 col-md-1"><?=Html::encode($order['order_id'])?></td>
            <td class="col-xs-2 col-md-2"><?=Html::encode($order['order_time'])?></td>
            <td><?=Html::encode($order['table_id'])?></td>
            <td><?=Html::encode($order['order_dishes'])?></td>
            <td><?=Html::encode($order['customer_id'])?></td>
            <td><?=Html::encode($order['original_price'])?></td>
            <td><?=Html::encode($order['present_price'])?></td>
            <td><?=Html::encode($order['order_status'])?></td>
        </tr>
    <?php }?>
    </tbody>
</table>
