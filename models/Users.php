<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/30
 * Time: 11:35
 */
namespace app\models;

use yii;
use yii\db\ActiveRecord;

/**
 * Class Article
 * @package app\modules\models
 * 会员中心模型
 */
class Users extends ActiveRecord
{

    public $remember = true;
    public $repassword;

    /**
     * @return string
     * 设置数据表
     */
    public static function tableName()
    {
        return '{{%users}}';
    }


    public function rules()
    {
        return [
            ['username', 'required', 'message' => '用户名不为空', 'on' => ['register', 'login','qqregister']],
            ['open_id', 'required', 'message' => 'open_id不为空', 'on' => ['qqregister']],
            ['username', 'unique', 'message' => '用户名必须是唯一', 'on' => ['register', 'registerMail','qqregister']],
            ['open_id', 'unique', 'message' => 'open_id必须是唯一', 'on' => ['qqregister']],
            ['password', 'required', 'message' => '密码不为空', 'on' => ['login', 'register','qqregister']],
            ['repassword', 'required', 'message' => '确认密码不为空', 'on' => ['register','qqregister']],
            ['repassword', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致', 'on' => ['register','qqregister']],
            ['email', 'required', 'message' => '邮箱不为空', 'on' => ['registerMail']],
            ['email', 'email', 'message' => '邮箱格式不正确', 'on' => ['register', 'registerMail']],
            ['email', 'unique', 'message' => '邮箱已被注册', 'on' => ['register', 'registerMail']],
            ['password', 'validatePassword', 'on' => ['login']],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'repassword' => '确认密码',
        ];
    }


    /**
     * 检测当前用户或者密码是否正确
     */
    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $data = self::find()->where('username = :username and password = :password', [':username' => $this->username, ':password' => md5($this->password)])->one();
            if (is_null($data)) {
                $this->addError('password', '用户名或者密码错误');
            }
        }
    }


    /**
     * @param $data
     * @param string $scenario
     * @return bool
     * 注册模型
     */
    public function register($data)
    {
        if ($this->load($data) && $this->validate()) {
            //这里需要注意的是当数据验证通过，则不需要再次验证，将save改为false即可
            $this->password = md5($this->password);
            $this->create_time = time();
            if ($this->save(false))
                return true;
        }
        return false;
    }


    public function qqregister($data)
    {
        if ($this->load($data) && $this->validate()) {
            //这里需要注意的是当数据验证通过，则不需要再次验证，将save改为false即可
            $this->password = md5($this->password);
            if ($this->save(false))
                return true;
        }
        return false;
    }


    /**
     * @param $data
     * @return bool
     * 登陆模型
     */
    public function login($data)
    {
        $this->scenario = 'login';
        if ($this->load($data) && $this->validate()) {
            $lifetime = $this->remember ? 24 * 3600 : 0;//保存一天
            $session = Yii::$app->session;
            session_set_cookie_params($lifetime);//保存一天
            //保存session
            $session['user_name'] = $this->username;
            $session['user_login'] = 1;
            return (bool)$session['user_login'];
        }
        return false;
    }




}