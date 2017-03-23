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
 */
class MeAccountInterface extends \yii\db\ActiveRecord
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
            ['password', 'string', 'length' => [4, 70]],
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
            'store_name' => 'Store Name',
            'nickname' => 'Nick Name',
            'grade' => 'Grade',
        ];
    }
    public function signup()
    {
        /* returncode   200 success 300 exists  400不符合规范
         *
         * */
        if($this->validate())
        {
            $user = static::findOne($this->phone);
            if($user)
            {
                $returndata = base64_encode(json_encode(array('returnCode'=> '300')));
                echo $returndata;
                exit(0);
            }
            else
            {
                $model = new MeAccountInterface();
                $model->phone = $this->phone;
                $model->password = Yii::$app->security->generatePasswordHash($this->password);
                $model->grade = $this->grade;
                if($model->save())
                {
                    $returndata =base64_encode(json_encode(array('returnCode'=>'200')));
                    echo $returndata;
                    exit(0);
                }
            }
        }
        $returndata =base64_encode(json_encode(array('returnCode'=>'400')));
        echo $returndata;
        exit(0);
    }
}
