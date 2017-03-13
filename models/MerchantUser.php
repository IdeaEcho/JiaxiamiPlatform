<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "merchant_user".
 *
 * @property string $phone
 * @property string $password
 * @property string $auth_key
 * @property string $storeName
 * @property string $nickName
 * @property integer $grade
 *
 * @property CoursesTypes[] $coursesTypes
 * @property Dishes[] $dishes
 */
class MerchantUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jxm_merchant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone', 'password', 'grade'], 'required'],
            [['grade'], 'integer'],
            ['phone','match','pattern'=>'/^1[0-9]{10}$/'],
            [['password'], 'string', 'length' => [4,70]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Phone',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'storeName' => 'Store Name',
            'nickName' => 'Nick Name',
            'grade' => 'Grade',
        ];
    }
    public static function findByPhone($phone)
    {
        return static::findOne(['phone' => $phone]);
    }
}
