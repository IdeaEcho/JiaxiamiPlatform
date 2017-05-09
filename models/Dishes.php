<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;


/**
 * This is the model class for table "dishes".
 *
 * @property string $merchant_id
 * @property integer $dish_id
 * @property string $dish_name
 * @property integer $types_id
 * @property string $dish_price
 * @property integer $dish_sales
 * @property string $dish_photos
 * @property double $dish_grade
 */
class Dishes extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jxm_menu';
    }
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['upload'] = ['merchant_id', 'dish_name', 'dish_price','imageFile'];
        $scenarios['noupload'] = ['merchant_id', 'dish_name', 'dish_price'];
        return $scenarios;
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'dish_name', 'dish_price'], 'required'],
            [['type_id'], 'number'],
            [['dish_price'], 'number'],
            [['dish_name'], 'string', 'length' => [3,20]],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['dish_photo'], 'string', 'max' => 100],
            [['acid'], 'number'],
            [['sweet'], 'number'],
            [['hot'], 'number'],
            [['salty'], 'number'],
        ];
    }
    public function attributeLabels()
    {
        return [
            'merchant_id' => 'merchant_id',
            'dish_id' => 'ID',
            'type_id' => '分类',
            'dish_name' => '名称',
            'dish_price' => '价格',
            'dish_sales' => '销量',
            'dish_photo' => '图片',
            'dish_grade' => 'Dish Grade',
            'dish_status'=> 'Dish STATUS',
            'imageFile'=>'图片文件',
            'acid'=> '酸',
            'sweet'=> '甜',
            'hot'=> '辣',
            'salty'=> '咸'
        ];
    }
    public function upload()
    {
        if($this->imageFile->saveAs(dirname(__DIR__).'/web/dishesimg/' . $this->imageFile->baseName . '.' . $this->imageFile->extension))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
