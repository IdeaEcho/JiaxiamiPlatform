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
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>历史订单</h5>
                    </div>
                    <div class="ibox-content" >
                        <table class="table">
                            <thead>
                            <tr class="row">
                                <th class="col-xs-1 col-md-1">#</th>
                                <th class="col-xs-2 col-md-1">订单号</th>
                                <th class="col-xs-2 col-md-1">时间</th>
                                <th class="col-xs-1 col-md-2">桌号</th>
                                <th>菜品和数量</th>
                                <th class="col-xs-2 col-md-1">用户手机号</th>
                                <th>原价</th>
                                <th>现价</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $count=1; foreach ($model as $order){?>
                                <tr class="row">
                                    <?php
                                        $dishes = $order['order_dishes'];
                                        $dishes = json_decode($dishes,true);
                                    ?>
                                    <td class="col-xs-1 col-md-1"><?=$count++?></td>
                                    <td class="col-xs-1 col-md-1"><?=Html::encode($order['order_id'])?></td>
                                    <td class="col-xs-2 col-md-2"><?=Html::encode($order['order_time'])?></td>
                                    <td><?=Html::encode($order['table_id'])?></td>
                                    <td><ul>
                                        <?php
                                            foreach($dishes as $tmpdata)
                                            {
                                                echo '<li>'.$tmpdata['name']."*".$tmpdata['no'].'</li>';
                                            }
                                        ?>
                                    </ul></td>
                                    <td><?=Html::encode($order['customer_id'])?></td>
                                    <td><?=Html::encode($order['original_price'])?></td>
                                    <td><?=Html::encode($order['present_price'])?></td>
                                    <td><?=Html::encode($order['order_status'])?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>
