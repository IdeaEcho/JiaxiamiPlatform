<?php
use yii\helpers\Html;
use yii\helpers\Json;
?>

<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
    <thead>
    <tr>
        <th data-toggle="true">时间</th>
        <th>桌号</th>
        <th>菜品和数量</th>
        <th>总价</th>
        <th data-hide="all">订单号</th>
        <th data-hide="all">用户手机号</th>
        <th data-hide="all">菜品</th>
        <th data-hide="all">总价</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model as $neworder){?>
    <tr>
        <?php
            $data = $neworder['order_dishes'];
            $data = json_decode($data,true);
        ?>
        <td><?=$neworder['order_time']?></td>
        <td><?=$neworder['table_id']?></td>
        <td><?=$data[0]['name']."*".$data[0]['no']   ?></td>
        <td><?=$neworder['present_price']?></td>
        <td><?=$neworder['order_id']?></td>
        <td><?=$neworder['customer_id']?></td>
        <td>
            <ul>
                <?php
                    foreach($data as $tmpdata)
                    {
                        echo '<li>'.$tmpdata['name']."*".$tmpdata['no'].'</li>';
                    }
                ?>
            </ul>
        </td>
        <td><?=$neworder['present_price']?></td>
        <td>
            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#myDialog" data-data=''>
                <i class="glyphicon glyphicon-edit icon-white"></i>
                接受
            </a>
            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#myDialog" data-data=''>
                <i class="glyphicon glyphicon-edit icon-white"></i>
                拒绝
            </a>
        </td>
    </tr>
    <?php }?>

    <tfoot>
    <tr>
        <td colspan="5">
            <ul class="pagination pull-right"></ul>
        </td>
    </tr>
    </tfoot>
</table>
