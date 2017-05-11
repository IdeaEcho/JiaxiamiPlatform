<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\MeAccountInterface;
use app\models\UploadForm;
use yii\web\UploadedFile;

class TestController extends Controller
{
    public $layout =false;
    public function actionUpload()
    {
        $model = new UploadForm();
        return $this->render('upload', ['model' => $model]);
    }
    public function actionEdit()
    {
        $model = new UploadForm();
        $data = Yii::$app->request->post();
        $phone = Yii::$app->user->identity->phone;
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                //print_r($model);
                echo $model->imageFile->baseName;
                echo $model->imageFile->extension;
                $account = MeAccountInterface::findOne(['phone' => $phone]);
                $account->nickname = $data['UploadForm']['username'];
                $account->avatar = './uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension;
                Yii::$app->user->identity->nickname =  $account->nickname;
                Yii::$app->user->identity->avatar = '/uploads/'.$phone.'.'.$model->imageFile->extension;
                if($account->save()) {
                    $result['status'] = 1;
                    $result['message'] = '保存成功';
                }
                $error = $account->getFirstErrors();
                if($error)
                {
                    $result['status'] = 0;
                    $result['message'] = current($errors);
                }
                return $this->renderJson($result);
            }
        }


    }
    public function actionFile()
    {
        if(file_exists("../uploads/"))
        {
            echo "exist";
        }
        else
        {
            echo "noexist";
        }
    }

}
