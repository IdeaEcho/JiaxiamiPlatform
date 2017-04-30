<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses_types".
 *
 * @property string $phone
 * @property integer $type_id
 * @property string $type_name
 * @property string $privilege
 *
 * @property MerchantUser $phone0
 */
class CoursesTypes extends \yii\db\ActiveRecord
{
    public $privilegeA;             //去零头
    public $privilegeB;             //满减
    public $privilegeB_lower;       //满减下限
    public $privilegeB_upper;       //满减上限


    public static function tableName()
    {
        return 'jxm_courses_types';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merchant_id', 'type_name', 'privilege'], 'required'],
            [['merchant_id'],'match','pattern'=>'/^1[0-9]{10}$/'],
            [['type_name'], 'string', 'length' => [2, 30],'message'=>'{attribute}长度不少于2'],
            [['privilege'], 'string', 'max' => 100],
//            [['privilegeA','privilegeB'],'boolean'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'merchant_id' => 'merchant_id',
            'type_id' => 'Typeid',
            'type_name' => '分类名',
            'privilege' => 'Privilege',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhone0()
    {
        return $this->hasOne(MerchantUser::className(), ['phone' => 'phone']);
    }
}
