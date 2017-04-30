<?php
/*
＊顾客账户
*/
namespace app\controllers;
use app\models\CuAccountInterface;
use yii\web\Controller;
use yii\helpers\ArrayHelper;
class CuinterfaceController extends Controller{
    public $layout = false;
    public function init()  {
        $this->enableCsrfValidation = false;
    }
    /*
    ＊　注册
     *　returncode   200 success 300 exists  400不符合规范
     */
    public function actionRegister() {
        //        $phone = '15659675720';
        //        $password = '147159';
        //        $array = array("phone"=>$phone,"password"=>$password);
        //        $array= json_encode($array);
        //        $array= base64_encode($array);
        //        echo $array;
        $request = \Yii::$app->request;
        if($request->isPost)
        {
            $data = $request->post('data'/*,$array*/);
            if($data)
            {
                $json = base64_decode($data);
                $dataArray = json_decode($json,true);
                if($dataArray)
                {
                    $model = new CuAccountInterface();
                    $model->phone = $dataArray['phone'];
                    $model->password = $dataArray['password'];
                    $model->nickname =$dataArray['phone'].'_'.rand(100000,999999);
                    if($model->signup())
                    {

                    }
                }
            }
        }
    }
    /*
    ＊　登录
     *　returnCode 200成功并返回数据  300用户名或密码错误  400数据不符合规范
     */
    public function actionLogin() {
        //        $phone = '15659675720';
        //        $password = '147159';
        //        $array = array("phone"=>$phone,"password"=>$password);
        //        $array= json_encode($array);
        //        $array= base64_encode($array);
        //        echo $array;
        $request = \Yii::$app->request;
        if($request->isPost){
            $data = $request->post('data'/*,$array*/);
            if($data){
                $dataArray = json_decode(base64_decode($data), true);
                if($dataArray){
                    $model = CuAccountInterface::findOne(['phone' => $dataArray['phone']]);
                    if($model && \Yii::$app->security->validatePassword($dataArray['password'],$model->password)){
                        $returndata = ArrayHelper::toArray($model,[
                            'app\models\CuAccountInterface'=>[
                                'phone',
                                'nickname',
                                'acid',
                                'sweet',
                                'hot',
                                'salty'
                            ],
                        ]);
                        $returndata['returnCode']='200';
                        echo base64_encode(json_encode($returndata));
                        exit(0);
                    }else{
                        $returndata=array('returnCode'=>'300');
                        echo base64_encode(json_encode($returndata));
                        exit(0);
                    }
                }
            }
            $returndata=array('returnCode'=>'400');
            echo base64_encode(json_encode($returndata));
            exit(0);
        }
    }
    /*
     * 查看账户是否存在
     * returnCode 200存在 300不存在
     */
    public function actionAccountexist() {
        //        $phone = '15659675720';
        //        $array = array("phone"=>$phone);
        //        $array= json_encode($array);
        //        $array= base64_encode($array);
        //        echo $array;
        $request = \Yii::$app->request;
        if($request->isPost){
            $data = $request->post('data'/*,$array*/);
            if($data){
                $json = base64_decode($data);
                $dataArray = json_decode($json,true);
                if($dataArray){
                    $model = CuAccountInterface::findOne(['phone'=>$dataArray['phone']]);
                    if($model){
                        $returndata = base64_encode(json_encode(array('returnCode'=> '200')));
                        echo $returndata;
                        exit(0);
                    }else{
                        $returndata = base64_encode(json_encode(array('returnCode'=> '300')));
                        echo $returndata;
                        exit(0);
                    }
                }
            }
            $returndata = base64_encode(json_encode(array('returnCode'=> '400')));
            echo $returndata;
            exit(0);
        }
    }
    public function actionTest(){
        $request = \Yii::$app->request;
        if($request->isPost){
            $data  = $request ->post();
            print_r($data);
        }
    }
}
