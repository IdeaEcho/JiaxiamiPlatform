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
//        $order_id = '14';
//        $data =  array('order_id'=>$order_id);
//        $data = json_encode($data);
//        print_r($data);
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
    public function actionSetorder()
    {
//        $access_token = 'a44f8138457ecb9e87daa34bd8501cb5';
//        $customer_id = '15659675727';
//        $table_id = '1';
//        $dish_json = array(["id"=>3,"no"=>4],["id"=>4,"no"=>4],["id"=>5,"no"=>4]);
//        $data = array('access_token'=>$access_token,'table_id'=>$table_id,"customer_id"=>$customer_id,'dish_json'=>$dish_json);
//        $data = json_encode($data);
//        print_r($data);
        $request = Yii::$app->request;
        if($request->isPost)
        {
            $data  = $request ->post('data'/*,$data*/);
            $data = json_decode($data,true);
            if($data)
            {
//                print_r($data);
                $phone = MeAccountInterface::findOne(["access_token"=>$data['access_token']])->phone;
                if($phone)
                {
                    $price = 0;
                    $dish_json = $data['dish_json'];
//                    print_r($dish_json);
                    foreach($dish_json as $key=>$value)
                    {
                        $temp_model=Dishes::findOne(["dish_id"=>$value['id']]);
                        $dish_price=$temp_model->dish_price*$value['no'];
                        $price+=$dish_price;
                        $dish_json[$key]['name'] = $temp_model->dish_name;
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
                        return json_encode(array("returnCode"=>"200"));
                    }
                    else
                    {
                        return json_encode(array("returnCode"=>"300"));
                    }

                }
            }
        }
        return json_encode(array("returnCode"=>"400"));
    }

    /*扫描二维码后判断是否是多人点餐*/
    public function actionTablesexist()
    {
//        $access_token = 'a44f8138457ecb9e87daa34bd8501cb5';
//        $table_id = '1';
//        $data = array(["access_token"=>$access_token,"table_id"=>$table_id]);
//        $data = json_encode($data);
//        print_r($data);
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
    /*获得菜单*/
    public function actionGetmenu()
    {
//        $access_token = 'a44f8138457ecb9e87daa34bd8501cb5';
//        $id = '1';
//        $data = array("access_token"=>$access_token);
//        $data = json_encode($data);
//        echo $data;
//        水费 物业管理处      电费242.49
//          联系海信修空调     垫付资金要打出一个单子并出示证明    燃气灶要修   加氨垫付了100
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
                    $store_data['avatar'] = 'http://eat.same.ac.cn'.substr($store_data['avatar'],1);
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
                        $dish_data[$key]['dish_photo'] = 'http://eat.same.ac.cn'.$value['dish_photo'];
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
}
