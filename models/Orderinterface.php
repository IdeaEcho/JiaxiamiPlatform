<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jxm_order".
 *
 * @property integer $order_id
 * @property integer $table_id
 * @property string $merchant_id
 * @property string $customer_id
 * @property string $order_time
 * @property string $order_dishes
 * @property integer $order_status
 * @property double $original_price
 * @property double $present_price
 *
 * @property JxmMerchant $merchant
 * @property JxmCustomer $customer
 */
class Orderinterface extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jxm_order';
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['table_id', 'merchant_id', 'customer_id', 'order_time', 'order_dishes', 'order_status', 'original_price', 'present_price'], 'required'],
            [['table_id', 'order_status'], 'integer'],
            [['order_time'], 'safe'],
            [['original_price', 'present_price'], 'number'],
            [['merchant_id', 'customer_id'], 'string', 'max' => 13],
            [['order_dishes'], 'string', 'max' => 1000],
            [['merchant_id'], 'string', 'max' => 13],
            [['customer_id'], 'string', 'max' => 13],
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
            'order_status' => 'Order Status',
            'original_price' => 'Original Price',
            'present_price' => 'Present Price',
        ];
    }
}
