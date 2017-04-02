<?php
namespace app\controllers;
use app\models\Orderinterface;
use Yii;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
use app\models\MeAccountInterface;
use app\models\Dishes;
use app\models\CoursesTypes;
use yii\helpers\Url;
class OrderinterfaceController extends Controller
{
    public $layout = false;
    public function init(){
        $this->enableCsrfValidation = false;
    }
    //获取订单状态
    public function actionGetorderstatus()
    {
        $request = Yii::$app->request;
        if ($request->isPost)
        {
            $data  = $request ->post('data'/*,$data*/);
            $data = json_decode($data,true);
            if($data)
            {
                $model = Orderinterface::findOne(['order_id'=>$data['order_id']]);
//                print_r($model);
                if($model)
                {
                    $returndata =ArrayHelper::toArray($model);
                    $returndata=json_encode(array('order_status'=>$returndata['order_status'],'returnCode'=>'200'));
                    return $returndata;
                }
            }
            return json_encode(array('returnCode'=>'300'));

        }
        return json_encode(array('returnCode'=>'400'));
    }
    //获取当前用户的所有订单
    public function actionGetorderhistory()
    {
        $request = Yii::$app->request;
        if ($request->isPost)
        {
            $data  = $request ->post('data');
            $data = json_decode($data,true);
            if($data)
            {
                $orderlist = Orderinterface::findAll(['customer_id'=>$data['customer_id']]);
                if($orderlist)
                {
                    $returndata =ArrayHelper::toArray($orderlist,[
                       'app\models\Orderinterface'=>[
                           'order_id',
                           'table_id',
                           'merchant_id',
                           'order_time',
                           'order_status',
                           'order_dishes',
                           'present_price'
                       ],
                   ]);
                    foreach($returndata as $key=>$value)
                    {
                        //通过商家id 获取商家名和商家头像
                        $store = MeAccountInterface::findOne(["phone"=>$value["merchant_id"]]);
                        $returndata[$key]['store_name'] = $store->store_name;
                        $returndata[$key]['store_avatar'] = 'http://eat.chenshuyao.cn'.substr($store->avatar,1);
                    }
                    $returndata=json_encode(array('returnCode'=>'200','order_list'=>$returndata));
                    return $returndata;
                }
            }
            return json_encode(array('returnCode'=>'300'));
        }
        return json_encode(array('returnCode'=>'400'));
    }
    //下订单
    public function actionSetorder()
    {
        $request = Yii::$app->request;
        if($request->isPost)
        {
            $data  = $request ->post('data'/*,$data*/);
            $data = json_decode($data,true);
            if($data)
            {
                $store = MeAccountInterface::findOne(["access_token"=>$data['access_token']]);
                $phone = $store->phone;
                if($phone)
                {
                    $price = 0;
                    $dish_json = $data['dish_json'];
                    foreach($dish_json as $key=>$value)
                    {
                        $temp_model=Dishes::findOne(["dish_id"=>$value['id']]);
                        $dish_price=$temp_model->dish_price*$value['no'];
                        $price+=$dish_price;
                        $dish_json[$key]['name'] = $temp_model->dish_name;
                        $dish_json[$key]['num'] = $value['no'];
                        $dish_json[$key]['price'] = $dish_price;
                    }
                    //                    print_r($dish_json);
                    $order = new Orderinterface();
                    $order->merchant_id  = isset($phone) ? $phone : null;
                    $order->table_id = isset($data['table_id']) ? $data['table_id'] : null;
                    $order->customer_id = isset($data['customer_id']) ? $data['customer_id'] : null;
                    $order->original_price = $price;
                    $order->present_price = $price;
                    $order->order_status = 1;
                    $order->order_time = date("Y-m-d H:i:s",time());
                    $order->order_dishes = json_encode($dish_json);

                    if($order->save())
                    {
                        $returndata['returnCode'] = "200";
                        $returndata['store_name'] = $store->store_name;
                        $returndata['store_avatar'] = 'http://eat.chenshuyao.cn'.substr($store->avatar,1);
                        $returndata['table_id'] = $order->table_id;
                        $returndata['order_id'] = $order->order_id;
                        $returndata['customer_id'] = $order->customer_id;
                        $returndata['order_price'] = $price;
                        $returndata['order_status'] = 1;
                        $returndata['order_time'] = $order->order_time;
                        $returndata['dish'] = json_encode($dish_json);
                        return json_encode($returndata);
                    }
                    else
                    {
                        //保存失败
                        return json_encode(array("returnCode"=>"300"));
                    }
                }
            }
        }
        //参数错误
        $returndata['returnCode'] = "400";
        return json_encode($returndata);
    }

    /*获得菜单*/
    public function actionGetmenu()
    {
        $request = Yii::$app->request;
        if($request->isPost)
        {
            $data = $request->post('data'/*,$data*/);
        //    print_r($data);
            $data = json_decode($data,true);
        //    print_r($data);
            if($data)
            {
                $model = MeAccountInterface::findOne(["access_token"=>$data["access_token"]]);
                if($model)
                {
                    $phone = $model->phone;
                    $store_data = ArrayHelper::toArray($model,[
                        'app\models\MeAccountInterface'=>[
                            'phone',
                            'store_name',
                            'nickname',
                            'grade',
                            'avatar'
                        ],
                    ]);
                    $store_data['avatar'] = 'http://eat.chenshuyao.cn'.substr($store_data['avatar'],1);
                    $model=Dishes::findAll(["merchant_id"=>$phone]);
                    $dish_data = ArrayHelper::toArray($model,[
                        'app\models\Dishes'=>[
                            'dish_id',
                            'type_id',
                            'dish_name',
                            'dish_price',
                            'dish_sales',
                            'dish_photo',
                            'dish_grade',
                            'dish_status',
                            'acid',
                            'sweet',
                            'hot',
                            'salty'
                        ],
                    ]);
                    foreach($dish_data as $key=>$value)
                    {
                        $dish_data[$key]['dish_photo'] = 'http://eat.chenshuyao.cn'.$value['dish_photo'];
                    }
                    $model = CoursesTypes::findAll(["merchant_id"=>$phone]);
                    $tag_data = ArrayHelper::toArray($model,[
                        'app\models\CoursesTypes'=>[
                            'type_id',
                            'type_name',
                            'privilege'
                        ],
                    ]);
                    $returndata['dishes'] = $dish_data;
                    $returndata['store'] = $store_data;
                    $returndata['tags'] = $tag_data;

//                    print_r($returndata['dishes']);
//                    return ;
                    return json_encode($returndata);
                }
            }
        }
        // return $this->redirect(Url::toRoute("site/index"));
    }

    /*扫描二维码后判断是否是多人点餐*/
    public function actionTablesexist()
    {
        $request = Yii::$app->request;

        if($request->isPost)
        {
            $data = $request->post('data'/*,$data*/);
//            print_r($data);
            $data = json_decode($data,true);
            if($data)
            {
                $model = MeAccountInterface::findOne(["access_token"=>$data['access_token']]);
//                print_r($model);
                if($model)
                {
                    $phone = $model->phone;
                    $model= Orderinterface::findAll(["merchant_id"=>$phone,"table_id"=>$data['table_id'],"order_status"=>0]);
                    if($model)
                    {
                        return json_encode(array("returnCode"=>"200"));
                    }
                    else
                    {
                        return json_encode(array("returnCode"=>"400"));
                    }
                }
            }
        }
        return json_encode(array("returnCode"=>"300"));
    }
}
