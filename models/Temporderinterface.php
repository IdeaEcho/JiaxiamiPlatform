<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "temp_order".
 *
 * @property integer $order_id
 * @property integer $table_id
 * @property string $merchant_id
 * @property string $customer_id
 * @property integer $order_time
 * @property string $order_dishes
 * @property integer $order_status
 * @property double $original_price
 * @property double $present_price
 */
class Temporderinterface extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'temp_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_id', 'merchant_id', 'customer_id', 'order_time', 'order_dishes', 'order_status', 'original_price', 'present_price'], 'required'],
            [['table_id', 'order_time', 'order_status'], 'integer'],
            [['original_price', 'present_price'], 'number'],
            [['merchant_id'], 'string', 'max' => 13],
            [['customer_id'], 'string', 'max' => 100],
            [['order_dishes'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'table_id' => 'Table ID',
            'merchant_id' => 'Merchant ID',
            'customer_id' => 'Customer ID',
            'order_time' => 'Order Time',
            'order_dishes' => 'Order Dishes',
            'order_status' => 'Order Flag',
            'original_price' => 'Original Cost',
            'present_price' => 'Present Price',
        ];
    }
}
