<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;


/**
 * This is the model class for table "dishes".
 *
 * @property string $merchant_id
 * @property integer $dish_id
 * @property integer $types_id
 * @property string $dish_name
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
            [['dish_price'], 'number'],
            [['dish_name'], 'string', 'length' => [3,20]],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['dish_photo'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'merchant_id' => 'merchant_id',
            'dish_id' => 'Dish ID',
            'types_id' => 'Types ID',
            'dish_name' => '菜品名称',
            'dish_price' => '价格',
            'dish_sales' => 'Dish Sales',
            'dish_photo' => 'Dish Photo',
            'dish_grade' => 'Dish Grade',
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
//            echo "路径错误";
            return false;
        }
    }
}
