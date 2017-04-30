<?php

namespace app\controllers;

use Yii;
use app\models\Dishes;
use app\models\CoursesTypes;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class DishesController extends Controller
{
    public $layout = false;
    //新增、编辑菜品
    public function actionIndex()
    {
        $phone = Yii::$app->user->identity->phone;
        $typelist = CoursesTypes::find()->where(['merchant_id'=>$phone])->all();
        return $this->render('index',[
            'model'=>new Dishes(),
            'typelist'=>$typelist
        ]);
    }
    //菜品列表
    public function actionList()
    {
        $phone = Yii::$app->user->identity->phone;
        $dishlist = Dishes::find()->where(['merchant_id'=>$phone])->all();
        foreach($dishlist as $key=>$value) {
            $coursetype = CoursesTypes::findOne(['merchant_id'=>$phone,'type_id'=>$value['type_id']]);
            $dishlist[$key]['type_name'] = $coursetype->type_name;
        }
        return $this->renderPartial('list',['model'=>$model]);
    }
    //删除菜品
    public function actionDel($id)
    {
        $result =array();
        $phone = Yii::$app->user->identity->phone;
        $model = Dishes::findOne(['merchant_id'=>$phone,'dish_id'=>$id]);
        if($model)
        {
            $model->delete();
            $result['status']=1;
            $result['message']='删除成功';
        }
        return $this->renderJson($result);
    }
    //提交编辑菜品
    public function actionEdit()
    {
        if(Yii::$app->request->isPost)
        {
            $origndata = Yii::$app->request->post();
            $data = $origndata['Dishes'];
            $phone = Yii::$app->user->identity->phone;
            $result = array();
            $model = null;
            /*判断是新建还是编辑*/
            if(is_numeric($data['dish_id']) && $data['dish_id'] >0)
            {
                $model = Dishes::findOne(['merchant_id'=>$phone, 'dish_id'=>$data['dish_id']]);
                if(!$model)
                {
                    $result['status'] = 0;
                    $result['message'] = '未找到该记录';
                }
            }
            else
            {
                $model = new Dishes();
            }
            $origndata['Dishes']['merchant_id']=$phone;
            $imgdata = UploadedFile::getInstance($model,'imageFile');

            // var_dump($imgdata);

            //有上传文件
            if($imgdata!=null)
            {
                $model->imageFile = $imgdata;
                if($model->upload())
                {
                    /***************************************后期需要改成hash加密**********************************************/
                    $newfilename = md5($model->imageFile->baseName.time(),false);
                    $oldpath = 'dishesimg/' . $model->imageFile->baseName . '.' . $model->imageFile->extension;
//                    echo $oldpath;
//                    echo file_exists($oldpath);
                    $newpath = 'dishesimg/' . $newfilename . '.' . $model->imageFile->extension;
                    @rename($oldpath,$newpath);
                    $origndata['Dishes']['dish_photo'] = '/dishesimg/' . $newfilename . '.' . $model->imageFile->extension;
                }
                else
                {
                    $result['status'] = 0;
                    $result['message'] = '图片上传失败';
                }
            }

            //没有上传文件
            if($model->load($origndata))
            {
                if($model->save())
                {
                    $result['status'] = 1;
                    $result['message'] = '保存成功';
                }
            }

            $error = $model->getFirstErrors();
            if($error)
            {
                $result['status'] = 0;
                $result['message'] = current($errors);
            }
            return $this->renderJson($result);
        }
    }
    public function renderJson($params = array())
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return $params;
    }
}
