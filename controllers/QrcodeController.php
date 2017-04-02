<?php

namespace app\controllers;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
require_once ("../vendor/phpqrcode/phpqrcode.php");
class QrcodeController extends Controller
{
    public $layout = false;
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionDownload()
    {
        $data = \Yii::$app->request->post();
        $img= new \QRcode();
        if(is_numeric($data['low_number']) && is_numeric($data['high_number']) && $data['low_number']<=$data['high_number'])
        {
            $errorCorrectionLevel = 'H';//容错级别
            $matrixPointSize = 7;//生成图片大小
            $file_path = 'qrcode/'.Yii::$app->user->identity->access_token.'/';
            if(!file_exists($file_path))
            {
                mkdir($file_path);
            }

//            echo $file_path;

            for($i = $data['low_number'];$i<=$data['high_number'];$i++)
            {
                $value = 'http://eat.chenshuyao.cn/orderinterface/getmenu.html?token='.Yii::$app->user->identity->access_token.'&id='.$i; //二维码内容
                $img::png($value, $file_path.$i.'.png', $errorCorrectionLevel, $matrixPointSize, 2);
                $QR = $file_path.$i.'.png';//已经生成的原始二维码图/
                $logo = Yii::$app->user->identity->avatar;
                if ($logo !== FALSE) {
                    $QR = imagecreatefromstring(file_get_contents($QR));
                    $logo = imagecreatefromstring(file_get_contents($logo));
                    $QR_width = imagesx($QR);//二维码图片宽度
                    $QR_height = imagesy($QR);//二维码图片高度
                    $logo_width = imagesx($logo);//logo图片宽度
                    $logo_height = imagesy($logo);//logo图片高度
                    $logo_qr_width = $QR_width / 5;
                    $scale = $logo_width/$logo_qr_width;
                    $logo_qr_height = $logo_height/$scale;
                    $from_width = ($QR_width - $logo_qr_width) / 2;
                    //重新组合图片并调整大小
                    imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
                        $logo_qr_height, $logo_width, $logo_height);
                }

                imagepng($QR, $file_path.$i.'.png');
            }

            return $this->redirect(Url::toRoute('qrcode/test'));
        }
        else
        {
            return $this->render('index');
        }
    }

    public function actionTest()
    {
        $zipname = 'qrcode/'.Yii::$app->user->identity->access_token.'.zip';
        if(!file_exists($zipname))
        {
            $fopen = fopen($zipname, "w");
            fclose($fopen);
        }
        $zip = new \ZipArchive();
        if($zip->open($zipname,\ZipArchive::OVERWRITE) == true)
        {
            $this->addFileToZip('qrcode/'.Yii::$app->user->identity->access_token,$zip);
            $zip->close();
        }

        header ( "Cache-Control: max-age=0" );
        header ( "Content-Description: File Transfer" );
        header ( 'Content-disposition: attachment; filename=' . basename ( $zipname ) ); // 文件名
        header ( "Content-Type: application/zip" ); // zip格式的
        header ( "Content-Transfer-Encoding: binary" ); // 告诉浏览器，这是二进制文件
        header ( 'Content-Length: ' . filesize ( $zipname ) ); // 告诉浏览器，文件大小
        @readfile ( $zipname );//输出文件;
    }
    public function addFileToZip($path,$zip)
    {
        $handler = opendir($path);
        while(($filename = readdir($handler))!==false)
        {
            if($filename!="." && $filename!="..")
            {
                if(is_dir($path."/".$filename))
                {
                    $this->addFileToZip($path."/".$filename,$zip);
                }
                else
                {
                    $zip->addFile($path."/".$filename);
                }
            }
        }
        @closedir($path);
    }
}
