<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_user".
 *
 * @property string $phone
 * @property string $nickname
 * @property string $password
 */
class CuAccountInterface extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jxm_customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['phone'], 'required'],
            ['phone','match','pattern'=>'/^1[0-9]{10}$/'],
            [['nickname'], 'string', 'max' => 20],
            [['acid'], 'number'],
            [['sweet'], 'number'],
            [['hot'], 'number'],
            [['salty'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'phone' => 'Phone',
            'nickname' => 'Nickname',
            'password' => 'Password',
        ];
    }
    /*
     * 登录
     * returncode   200 success 300 exists  400不符合规范
     */
    public function signup()
    {
        if($this->validate())
        {
            $user = static::findOne($this->phone);
            if($user)
            {
                /*有此用户*/
                $returndata = base64_encode(json_encode(array('returnCode'=> '300')));
                echo $returndata;
                exit(0);
            }
            else
            {
                /*没有此用户，满足注册条件*/
                $model = new CuAccountInterface();
                $model->phone = $this->phone;
                $model->password = Yii::$app->security->generatePasswordHash($this->password);
                $model->nickname = $this->nickname;
                if($model->save())
                {
                    $returndata =base64_encode(json_encode(array('returnCode'=>'200')));
                    echo $returndata;
                    exit(0);
                }
            }
        }
        /*数据有误*/
        $returndata =base64_encode(json_encode(array('returnCode'=>'400')));
        echo $returndata;
        exit(0);
    }
}
