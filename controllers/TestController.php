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
//                print_r($model);
                print_r($data['username']);
                echo $model->imageFile->baseName;
                echo $model->imageFile->extension;
                $account = MeAccountInterface::findOne(['phone' => $phone]);
                $account->nick_name = $data['UploadForm']['username'];
                $account->avatar = './uploads/'.$model->imageFile->baseName.'.'.$model->imageFile->extension;
//                echo json_encode($data);
                // 文件上传成功
                return;
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
