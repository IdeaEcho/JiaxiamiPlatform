<?php
namespace app\controllers;
use app\models\Dishes;
use app\models\MeAccountInterface;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UrlManager;

class MeinterfaceController extends Controller
{
    public $layout = false;
    public function init(){
        $this->enableCsrfValidation = false;
    }
    public function actionLogin()
    {
        /*returnCode 200成功并返回数据  300用户名或密码错误  400数据不符合规范
         *
         * */
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
                $dataArray = json_decode(base64_decode($data), true);
                if($dataArray)
                {
                    $model = MeAccountInterface::findOne(['phone' => $dataArray['phone']]);
                    if($model && \Yii::$app->security->validatePassword($dataArray['password'],$model->password))
                    {
                        $returndata = ArrayHelper::toArray($model,[
                            'app\models\MeAccountInterface'=>[
                                'phone',
                                'storeName',
                                'nickName',
                                'grade'
                            ],
                        ]);
                        $returndata['returnCode']='200';
                        echo base64_encode(json_encode($returndata));
                        exit(0);
                    }
                    else
                    {
                        $returndata=array(['returnCode'=>'300']);
                        echo base64_encode(json_encode($returndata));
                        exit(0);
                    }
                }
            }
            $returndata=array(['returnCode'=>'400']);
            echo base64_encode(json_encode($returndata));
            exit(0);
        }
    }
    public function actionAccountexist()
    {
        /*
         * returnCode 200存在 300不存在
         *
         * */
//        $phone = '15659675715';
//        $array = array("phone"=>$phone);
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
                    $model = MeAccountInterface::findOne(['phone'=>$dataArray['phone']]);
                    if($model)
                    {
                        $returndata = (json_encode(array(['returnCode'=> '200'])));
                        echo $returndata;
                        exit(0);
                    }
                    else
                    {
                        $returndata = (json_encode(array(['returnCode'=> '300'])));
                        echo $returndata;
                        exit(0);
                    }
                }
//                print_r($model);
            }
            $returndata = (json_encode(array(['returnCode'=> '400'])));
            echo $returndata;
            exit(0);
        }
    }
    public function actionRegister()
    {
        /* returncode   200 success 300 exists  400不符合规范
         *
         * */
//        $phone = '15659675720';
//        $password = '147159';
//        $array = array("phone"=>$phone,"password"=>$password);
//        $array= json_encode($array);
//        $array= base64_encode($array);
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
                    $model = new MeAccountInterface();
                    $model->phone = $dataArray['phone'];
                    $model->password = $dataArray['password'];
                    $model->grade =5;
                    if($model->signup())
                    {

                    }
                }
            }
        }
    }


}
