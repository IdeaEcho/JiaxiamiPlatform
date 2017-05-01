<?php
use yii\helpers\Html;
use yii\helpers\Json;

?>
<?php
    $newlist = array();
    $inglist = array();
    $ordercount = 0;
    foreach($model as $temp)
    {
        if($temp['order_status']== 1)
        {
            $ordercount++;
            array_push($newlist,$temp);
        }
        else if($temp['order_status']==2)
        {
            array_push($inglist,$temp);
        }
    }
?>

    <input type="hidden" id="ordercount" value="<?=$ordercount?>"/>
    <div class="col-sm-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>新订单</h5>
                <div class="ibox-tools">
<!--                    <a class="collapse-link">-->
<!--                        <i class="fa fa-chevron-up"></i>-->
<!--                    </a>-->
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="javascript:void(0);" onclick="acceptall()">全部接受</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ibox-content">
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
                    <?php foreach ($newlist as $neworder) {?>
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
                                <a class="btn btn-info" href="javascript:void(0);" onclick="accept(<?=$neworder['order_id'] ?>)">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>接受</a>
                                <a class="btn btn-info" href="javascript:void(0);"onclick="Cancel(<?=$neworder['order_id'] ?>)">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>拒绝</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <ul class="pagination pull-right"></ul>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>当前订单</h5>
                <div class="ibox-tools">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="javascript:void(0);" onclick="finishall()">全部完成</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ibox-content">
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
                    <?php foreach ($inglist as $ingorder) {?>
                        <tr>
                            <?php
                            $data = $ingorder['order_dishes'];
                            $data = json_decode($data,true);
                            ?>
                            <td><?=$ingorder['order_time']?></td>
                            <td><?=$ingorder['table_id']?></td>
                            <td><?=$data[0]['name']."*".$data[0]['no']   ?></td>
                            <td><?=$ingorder['present_price']?></td>
                            <td><?=$ingorder['order_id']?></td>
                            <td><?=$ingorder['customer_id']?></td>
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
                            <td><?=$ingorder['present_price']?></td>
                            <td>
                                <a class="btn btn-info" href="#" onclick="finish(<?=$ingorder['order_id'] ?>)">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>完成</a>
                            </td>
                        </tr>
                    <?php } ?>
                    <tfoot>
                    <tr>
                        <td colspan="5">
                            <ul class="pagination pull-right"></ul>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
