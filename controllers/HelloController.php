<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EntryForm;
//require_once ("../vendor/phpqrcode/phpqrcode.php");
class HelloController extends Controller
{
    public function actionIndex(){
//        $img= new \QRcode();
//        $value = 'http://www.cnblogs.com/txw1958/'; //二维码内容
//        $errorCorrectionLevel = 'L';//容错级别
//        $matrixPointSize = 6;//生成图片大小
//        //生成二维码图片
//        $img::png($value, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2);
//        echo '<img src="qrcode.png">';


	// echo "hello world";
	// $temp1=array(1,2);
	// $tmp='hello_god';
	// $temp=array();
	// $temp['haha']=$tmp;
	// $temp['number']=$temp1;
	// return $this->renderPartial('test',$temp);
        return $this->renderPartial('index');
    }
    public function actionGet(){
        $request = YII::$app->request;
        if($request->isGet)
        {
            echo $request->get("id",50);
            echo "this is get method";
            echo "the IP address is $request->userIp";
        }
        else
        {
            echo "this is post method";
        }

    }
    public function actionPost(){
        $request = YII::$app->request;
        echo $request->post('name',3333);

    }
    public function actionViewcreate(){
        $hello_str="hello god";
        //创建一个数组
        $data=array();
        //把数据放到数组中
        $data['view_hello_str']=$hello_str;
        //数据安全
        $data['javascript']='<script>alert(3);</script>';
        return $this ->renderPartial('viewCreate',$data);
    }
    public function actionResponse(){
        $res = YII::$app->response;
        // 返回的状态码
        $res->statusCode = "200";
        // 添加pragma
        $res->headers->add('pragma','no-cache');
        // 设置pragma
        $res->headers->set('pragma','max-age=5');
        // 删除pragma 编译指令(杂注)
        $res->headers->remove('pragma');

        // 跳转
        // $res->headers->add('location','http://www.baidu.com');
    }
    public function actionEntry()
    {
        $model = new EntryForm;

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据

            // 做些有意义的事 ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }
}