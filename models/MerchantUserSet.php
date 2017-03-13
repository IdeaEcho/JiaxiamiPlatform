<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "merchant_user".
 *
 * @property integer $phone
 * @property string $password
 * @property string $storeName
 * @property string $nickName
 * @property integer $grade
 */
class MerchantUserSet extends ActiveRecord implements IdentityInterface
{
//    $property 记住我
    public $rememberMe = false;
//    $property 验证码
    public $verifyCode;
//    $property 注册手机短信验证码
    public $smsVerifyCode;
//    $property 重置密码手机短信验证码
    public $resetSmsVerify;
    //$property 确认密码
    public $verifyPassword;
//    $property 新密码
    public $newPassword;
//    $property 验证新密码
    public $verifyNewPassword;
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
    public function attributeLabels()
    {
        return [
            'phone' => '手机号',
            'password' => '密码',
            'store_name' => '店铺名',
            'nickname' => '商家昵称',

            'grade' => '评分',
            'verifyCode' => '验证码',
            'smsVerifyCode' =>'短信验证码',
            'verifyPassword' =>'确认密码',
            'newPassword'=>'新密码',
            'verifyNewPassword' => '确认新密码',
            'resetSmsVerify'=>'短信验证码'
        ];
    }
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($this->isNewRecord)
            {
                $this->auth_key = \Yii::$app->security->generateRandomString();
                return true;
            }
        }
        return false;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            通用去空格
            [['phone','grade','password','store_name','nickname','verifyCode','verifyPassword','resetSmsVerify'],'trim'],     //remove non-breaking space
            ['phone','match','pattern'=>'/^1[0-9]{10}$/','message'=>'{attribute}必须为1开头的11位手机号'],    //phone number
            ['password', 'string', 'length' => [4, 70],"message" =>'{attribute}必须大于4位'], //length
//            登录
            [['phone','password','verifyCode'],'required','on' => 'login','message' => '{attribute}不能为空'],           //necessary
            ['password', 'validatePassword', 'on' => 'login'],      //call function named validatePassword()
            ['rememberMe','boolean','on'=>'login'],     //remember password  whether or not
            ['verifyCode','captcha','captchaAction'=>'site/captcha','on'=>['login','resetFirst']],     //captcha
//            注册
            [['phone','smsVerifyCode','password','verifyPassword'],'required','on' => 'register','message' =>'{attribute}不能为空'],
            ['smsVerifyCode','validateSms','on' => 'register'],     //verify sms verifyCode
            ['verifyPassword','compare','compareAttribute' => 'password','on' =>['register','resetThird'],'message' =>'两次输入的密码不一致，请重新输入'],  //Verify Password
//            重置密码首页
            [['phone','verifyCode'],'required','on' => 'resetFirst','message'=>'{attribute}不能为空'],
            ['phone','validatePhoneExist','on'=>'resetFirst'],
//            重置密码验证码页
            ['resetSmsVerify','required', 'on'=>'resetSecond','message'=>'{attribute}不能为空'],
            ['resetSmsVerify','validateResetPassword','on'=>'resetSecond'],
//            重置密码 密码页
            [['password','verifyPassword'],'required','on' => 'resetThird','message' => '{attribute}不能为空'],
//            修改密码
            [['phone','password','newPassword','verifyNewPassword'],'required','on'=>'changePwd'],
            [['newPassword','verifyNewPassword'],'string','length' => [4, 20],'on'=>'changePwd',"message" =>'{attribute}必须大于4位'],
            ['verifyNewPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => '请重复输入新密码', 'on' => 'changePwd'], //newPassword与verifyNewPassword是否相同
            [['wifi_ssid','wifi_password'],'required','on'=>'changeWifi','message'=>'{attribute}不能为空'],
            ['wifi_ssid','string','length'=>[1,32],'on'=>'changeWifi','message'=>'{attribute}长度必须在1-32位'],
            ['wifi_password','string','length'=>[8,18],'on'=>'changeWifi','message'=>'{attribute}长度必须大于7位']
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['login'] = ['phone','password','rememberMe','verifyCode'];
        $scenarios['register'] = ['phone','smsVerifyCode','password','verifyPassword'];
        $scenarios['resetFirst'] = ['phone','verifyCode'];
        $scenarios['resetSecond'] = ['resetSmsVerify'];
        $scenarios['resetThird'] =['password','verifyPassword'];
        $scenarios['changePwd']=['password','newPassword','verifyNewPassword'];
        $scenarios['changeWifi'] = ['wifi_ssid','wifi_password'];
        return $scenarios;
    }

    public function editWifi($phone)
    {
        $merchant = MerchantUser::findByPhone($phone);
        if($merchant)
        {
            if($this->validate())
            {
                $merchant->wifi_ssid = $this->wifi_ssid;
                $merchant->wifi_password = $this->wifi_password;
//                print_r($merchant);
                if($merchant->save())
                {
                    return true;
                }
                else
                {
//                    print_r($merchant);
                    $this->addError('data',"数据验证失败");
                    return false;
                }
            }
        }
        else
        {
            $this->addError('phone','未找到此用户');
        }
    }


    //
    public static function findByPhone($phone)
    {
        return static::findOne(['phone' => $phone]);
    }
    /**/
    public function validatePhoneExist($attribute)
    {
        if(!$this->hasErrors())
        {
            $phone = static::findByPhone($this->phone);
            if(!$phone)
            {
                $this->addError($attribute,'账号不存在');
            }
        }
    }
    public function validateResetPassword($attribute)
    {
        if(!$this->hasErrors())
        {
            $session = \Yii::$app->session;
            $session->open();
            if($session->has('resetPassword') && $session['resetPassword']['validTime']>time())
            {
                $phone = static::findByPhone($session['resetPassword']['phone']);
                if($phone)
                {
                    if($this->resetSmsVerify!=$session['resetPassword']['smsVerify'])
                    {
                        $this->addError($attribute,'验证码错误');
                    }
                }
                else
                {
                    $this->addError($attribute,'账号不存在');
                }
            }
            else
            {
                $this->addError($attribute,'验证码失效，请重新输入');
            }
            $session->close();
        }
    }
    public function validateSms($attribute)
    {
        if(!$this->hasErrors())
        {
            $session = \Yii::$app->session;
            $session->open();
            if($session->has('phone') && $session['phone']['validTime']>time())
            {
                $phone = static::findByPhone($this->phone);
                if(!$phone)
                {
                    if($this->phone!=$session['phone']['phoneNumber'] || $this->smsVerifyCode!=$session['phone']['smsVerify'])
                    {
                        $this->addError($attribute,'验证码错误');
                    }
                }
                else
                {
                    $this->addError($attribute,'账号已存在，请直接登录或重置密码');
                }
            }
            else
            {
                $this->addError($attribute,'验证码失效，请重新输入');
            }
            $session->close();

        }
    }
    public function validatePassword($attribute)
    {
//        if (!$this->hasErrors()) {
//            $phone = static::findByPhone($this->phone);
//            if (!$phone || !($this->password === $phone->password)) {
//                $this->addError($attribute, '用户名或者密码错误');
//            }
//        }
        if (!$this->hasErrors()) {
            $phone = static::findByPhone($this->phone);
            if (!$phone || !\Yii::$app->security->validatePassword($this->password,$phone->password)) {
                $this->addError($attribute, '用户名或者密码错误');
            }
        }
    }
    public function login()
    {
        if($this->validate())
        {
            return Yii::$app->user->login(static::findByPhone($this->phone),$this->rememberMe ? 3600*24*30 : 0);
        }
        else
        {
            return false;
        }
    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($phone)
    {
        return static ::findOne($phone);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->phone;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() ===$authKey;
    }

    public function signup()
    {
        if($this->validate())
        {
            /*要先判断账户是否重复,在验证码ajax的时候判断，后面还要再加入*/
            $phone = new MerchantUserSet();
            $phone->phone = $this->phone;
            $phone->password = Yii::$app->security->generatePasswordHash($this->password);
            $phone->grade = 5;
            $phone->access_token = substr(md5($this->phone,false),8,16);
            if($phone->save())
            {
                return $phone;
            }
        }
        return null;
    }
}
