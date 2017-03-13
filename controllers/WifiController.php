<?php

namespace app\controllers;

use app\models\MerchantUserSet;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\Response;
class WifiController extends Controller
{
    public $layout = false;
    public function actionIndex()
    {
        $model = new MerchantUserSet(['scenario'=>'changeWifi']);
        return $this->render('index',['model'=>$model]);
    }
    public function actionEditwifi()
    {
        $model = new MerchantUserSet(['scenario'=>'changeWifi']);
        $result = array();
        if($model->load(Yii::$app->request->post()) &&$model->editWifi(Yii::$app->user->identity->phone))
        {
            $result['status'] = 1;
            $result['message'] = '修改成功';
        }
        $errors = $model->getFirstErrors();
        if($errors)
        {
            $result['status'] = 0;
            $result['message'] = current($errors);
        }
        return $this->renderJson($result);
    }
    public function renderJson($params = array()) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $params;
    }
}
