<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\CoursesTypes;
use \yii\helpers\Url;
use yii\web\Response;
class MenuclassifypageController extends Controller
{
    public $layout=false;
    public function actionIndex()
    {
        return $this->render('index',['model'=>new CoursesTypes()]);
    }
    public function actionClassifyedit()
    {
        $origndata = Yii::$app->request->post();
        $data = $origndata['CoursesTypes'];
        $phone = Yii::$app->user->identity->phone;
        $result = array();
        $model=null;



        if(is_numeric($data['type_id']) && $data['type_id'] >0)
        {
            $model = CoursesTypes::findOne(['merchant_id'=>$phone,'type_id'=>$data['type_id']]);
            if(!$model)
            {
                $result['status'] = 0;
                $result['message'] = '未找到该记录';
            }
        }
        else
        {
            $model = new CoursesTypes();
        }

//        print_r($model);
//
//
//
        $privilege = array();
        $data['privilegeA'] == 1 ? $privilege['privilegeA']=1 : $privilege['privilegeA']=0;
        $privilege['privilegeB']=0;
        if($data['privilegeB'] == 1)
        {
            if(is_numeric($data['privilegeB_lower']) && is_numeric($data['privilegeB_upper']) && $data['privilegeB_lower']>=$data['privilegeB_upper'])
            {
                $privilege['privilegeB']=1;
                $privilege['privilegeB_lower'] = $data['privilegeB_lower'];
                $privilege['privilegeB_upper'] = $data['privilegeB_upper'];
            }
        }
        $privilege  = json_encode($privilege);
        $origndata['CoursesTypes']['privilege'] = $privilege;
        $origndata['CoursesTypes']['merchant_id'] = $phone;
//
        if($model->load($origndata))
        {
            if($model->save())
            {
                $result['status'] = 1;
                $result['message'] = '保存成功';
            }
        }
        $error = $model ->getFirstErrors();
        if($error)
        {
            $result['status'] = 0;
            $result['message'] = current($error);
        }
        return $this->renderJson($result);
    }
    public function actionClassifylist()
    {
        $phone = Yii::$app->user->identity->phone;
        $model = CoursesTypes::find()->where(['merchant_id'=>$phone])->all();
//        print_r($model);
        return $this->renderPartial('list',['model'=>$model]);
    }
    public function actionClassifydel($id)
    {
        $result =array();
        $phone = Yii::$app->user->identity->phone;
        $model = CoursesTypes::findOne(['merchant_id'=>$phone,'type_id'=>$id]);
        if($model)
        {
            $model->delete();
            $result['status']=1;
            $result['message']='删除成功';
        }
        return $this->renderJson($result);
    }
    public function renderJson($params = array())
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $params;
    }
}
