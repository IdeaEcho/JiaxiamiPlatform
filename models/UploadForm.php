<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $username;
    public $password;
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'imageFile' => '头像',
            'username' => '店铺名',
        ];
    }
    public function upload($name)
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(dirname(__DIR__).'/web/uploads/' . $name . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}
