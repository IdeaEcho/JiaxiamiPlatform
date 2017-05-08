<?php
/*
＊商家账户
*/
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
    public function init() {
        $this->enableCsrfValidation = false;
    }
    /*
     *登录
    ＊returnCode 200成功并返回数据  300用户名或密码错误  400数据不符合规范
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
                    $model = MeAccountInterface::findOne(['phone' => $dataArray['phone']]);
                    if($model && \Yii::$app->security->validatePassword($dataArray['password'],$model->password)){
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
                    }else{
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
    /*
     * 查看账户是否存在
     * returnCode 200存在 300不存在
     */
    public function actionAccountexist() {
        $request = \Yii::$app->request;
        if($request->isPost){
            $data = $request->post('data'/*,$array*/);
            if($data){
                $json = base64_decode($data);
                $dataArray = json_decode($json,true);
                if($dataArray){
                    $model = MeAccountInterface::findOne(['phone'=>$dataArray['phone']]);
                    if($model){
                        $returndata = (json_encode(array(['returnCode'=> '200'])));
                        echo $returndata;
                        exit(0);
                    }else{
                        $returndata = (json_encode(array(['returnCode'=> '300'])));
                        echo $returndata;
                        exit(0);
                    }
                }
            }
            $returndata = (json_encode(array(['returnCode'=> '400'])));
            echo $returndata;
            exit(0);
        }
    }
    /*
     * 注册
     * returncode   200 success 300 exists  400不符合规范
    */
    public function actionRegister() {
        $request = \Yii::$app->request;
        if($request->isPost) {
            $data = $request->post('data'/*,$array*/);
            if($data){
                $json = base64_decode($data);
                $dataArray = json_decode($json,true);
                if($dataArray){
                    $model = new MeAccountInterface();
                    $model->phone = $dataArray['phone'];
                    $model->password = $dataArray['password'];
                    $model->avatar = './uploads/logo.png';
                    $model->grade =5;
                    if($model->signup()){}
                }
            }
        }
    }
}
