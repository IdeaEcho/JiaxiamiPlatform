<?php

namespace app\controllers;
use app\models\Orderinterface;
use yii\web\Controller;
use yii\web\Response;
use Yii;
class OrderController  extends Controller
{
    //新订单1  接单并正在进行2    拒绝订单3   订单完成4
    public $layout = false;
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionNewlist()
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::find()->where(["merchant_id"=>$phone,"order_status"=> 1])->all();
        return $this->renderPartial('newlist',['model'=>$model]);
    //        print_r($model);
    }
    public function actionInglist()
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::find()->where(["merchant_id"=>$phone,"order_status"=>2])->all();
        return $this->renderPartial('inglist',['model'=>$model]);
    //        print_r($model);
    }
    public function actionHistoryindex()
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::find()->where(["merchant_id"=>$phone])->orderBy('order_time DESC')->all();
        return $this->render('historyindex',['model'=>$model]);
    }
    public function actionFinishall()
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::findAll(['order_status'=>2,'merchant_id'=>$phone]);
        $result = array();
        if($model)
        {
            foreach($model as $tmpmodel)
            {
                $tmpmodel->order_status = 4;
                $tmpmodel->save();
            }
            $result['status']=1;
            $result['message']='订单已全部完成';

            $error = $tmpmodel->getFirstErrors();
            if($error)
            {
                $result['status'] = 0;
                $result['message'] = current($error);
            }
            return $this->renderJson($result);
        }
    }
    public function actionFinish($id)
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::findOne(['order_id'=>$id,'merchant_id'=>$phone]);
        $result = array();
        if($model)
        {
            $model->order_status = 4;
            if($model->save())
            {
                $result['status']=1;
                $result['message']='成功';
            }

            $error = $model->getFirstErrors();
            if($error)
            {
                $result['status'] = 0;
                $result['message'] = current($error);
            }
            return $this->renderJson($result);

        }
    }
    public function actionList()
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::find()->where(["merchant_id"=>$phone])->all();
        return $this->renderPartial('list',['model'=>$model]);
    }
    public function actionAcceptall()
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::findAll(['order_status'=>1,'merchant_id'=>$phone]);
        $result = array();
        if($model)
        {
            foreach($model as $tmpmodel)
            {
                $tmpmodel->order_status = 2;
                $tmpmodel->save();
            }
            $result['status']=1;
            $result['message']='接受成功';


            $error = $tmpmodel->getFirstErrors();
            if($error)
            {
                $result['status'] = 0;
                $result['message'] = current($error);
            }

            return $this->renderJson($result);
        }
    }
    public function actionAccept($id)
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::findOne(['order_id'=>$id,'merchant_id'=>$phone]);
        $result = array();
        if($model)
        {
            $model->order_status = 2;
            if($model->save())
            {
                $result['status']=1;
                $result['message']='接受成功';

            }

            $error = $model->getFirstErrors();
            if($error)
            {
                $result['status'] = 0;
                $result['message'] = current($error);
            }

            return $this->renderJson($result);

        }
    }
    public function actionCancel($id)
    {
        $phone = Yii::$app->user->identity->phone;
        $model = Orderinterface::findOne(['order_id'=>$id,'merchant_id'=>$phone]);
        $result = array();
        if($model)
        {
            $model->order_status = 3;
            if($model->save())
            {
                $result['status']=1;
                $result['message']='拒绝成功';
            }

            $error = $model->getFirstErrors();
            if($error)
            {
                $result['status'] = 0;
                $result['message'] = current($error);
            }
            return $this->renderJson($result);

        }
    }
    public function renderJson($params = array())
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $params;
    }

    public function test()
    {
//        $newlist = array();
//        $inglist = array();
//        foreach($model as $temp)
//        {
//            if($temp['order_status']== 1)
//            {
//                array_push($newlist,$temp);
//            }
//            else if($temp['order_status']==2)
//            {
//                array_push($inglist,$temp);
//            }
//        }
//
//        $newdata ='<table class="footable table table-stripped toggle-arrow-tiny" data-page-size="8">
//    <thead>
//    <tr>
//        <th data-toggle="true">时间</th>
//        <th>桌号</th>
//        <th>菜品和数量</th>
//        <th>总价</th>
//        <th data-hide="all">订单号</th>
//        <th data-hide="all">用户手机号</th>
//        <th data-hide="all">菜品</th>
//        <th data-hide="all">总价</th>
//
//        <th>操作</th>
//    </tr>
//    </thead>
//    <tbody>';
//        foreach ($model as $neworder)
//        {
//            $data = $neworder['order_dishes'];
//            $data = json_decode($data,true);
//            $newdata .= '<tr>
//            <td>'.date('Y-m-d H:i:s',$neworder['order_time']).'</td>
//            <td>'.$neworder['table_id'].'</td>
//            <td>'.$data[0]['name']."*".$data[0]['no'].'</td>
//            <td>'.$neworder['present_price']. '</td>
//            <td>'.$neworder['order_id'].'</td>
//            <td>'.$neworder['customer_id'].'</td>
//            <td><ul>';
//            foreach($data as $tmpdata)
//            {
//                $newdata.='<li>'.$tmpdata['name']."*".$tmpdata['no'].'</li>';
//            }
//            $newdata.='</ul></td><td>'.$neworder['present_price'].'</td>';
//            $newdata.='<td>            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#myDialog" data-data=\'\'>
//                <i class="glyphicon glyphicon-edit icon-white"></i>
//                接受
//            </a>
//            <a class="btn btn-info" href="#" data-toggle="modal" data-target="#myDialog" data-data=\'\'>
//                <i class="glyphicon glyphicon-edit icon-white"></i>
//                拒绝
//            </a></td></tr>';
//        }
//        $newdata.='<tfoot><tr><td colspan="5"><ul class="pagination pull-right"></ul></td></tr></tfoot></table>';
////        return $newdata;
//        return json_encode(array(["newdata"=>$newdata]));
    }

}
