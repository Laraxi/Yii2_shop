<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/15
 * Time: 19:30
 */
namespace app\modules\models;

use yii;
use yii\db\ActiveRecord;

/**
 * Class Admin
 * @package app\modules\models
 * 管理员相关的模型数据
 */
class Admin extends ActiveRecord
{
    public $remember = true;//自定义属性，原数据库没有该字段
    public $repassword;//设置属性

    public static function tableName()
    {
        return "{{%admin}}";//设置表名
    }


    /**
     * @return array
     * 设置验证规则
     */
    public function rules()
    {
        return [
            ['username', 'required', 'message' => '用户名不为空', 'on' => ['login', 'seek', 'changepass', 'admin_add']],
            ['password', 'required', 'message' => '密码不为空', 'on' => ['login', 'changepass', 'admin_add']],
            ['password', 'validatePassword', 'on' => ['login']],
            ['repassword', 'required', 'message' => '新密码不为空', 'on' => ['changepass', 'admin_add']],
            ['repassword', 'compare', 'compareAttribute'=>'password', 'message'=>'两次密码必须一致','on'=>['admin_add','changepass']],
            ['remember', 'boolean', 'on' => ['login']],
            ['email', 'required', 'message' => 'email不为空', 'on' => ['seek']],
            ['email', 'unique', 'message' => 'email必须是唯一', 'on' => []],
            ['username', 'unique', 'message' => '用户名必须是唯一', 'on' => ['admin_add']],
            ['email', 'email', 'message' => 'email格式不正确', 'on' => ['seek']],
            ['email', 'validateEmail', 'on' => ['seek']],
        ];
    }


    public function attributeLabels()
    {
        return [
          'username'=>'用户名',
          'password'=>'密码',
          'remember'=>'记住我',
        ];
    }

    //自定义验证规则检测用户名和密码是否正确
    public function validatePassword()
    {
        //验证数据没有错误的时候，才去查询数据库，避免多请求查询造成压力
        if (!$this->hasErrors()) {
            $data = self::find()->where('username = :user and password = :pass', [':user' => $this->username, ':pass' => md5($this->password)])->one();
            if (is_null($data)) {
                $this->addError('password', '用户名或者密码不正确');
            }
        }

    }

    /**
     * 验证邮箱是否存在
     */
    public function validateEmail()
    {
        if (!$this->hasErrors()) {
            $data = self::find()->where('username = :user and email = :email', [':user' => $this->username, ':email' => $this->email])->one();
            if (is_null($data)) {
                $this->addError('email', '用户名或者邮箱不存在');
            }
        }
    }


    //登陆模型
    public function login($data)
    {
        $this->scenario = 'login';//验证场景机制
        if ($this->load($data) && $this->validate()) {
            $time = $this->remember ? 24 * 3600 : 0;//选中记住我的时候，保存1天的时间
            $session = Yii::$app->session;
            session_set_cookie_params($time);//写入cookie过期时间
            //存入session
            $session['admin_user'] =$this->username;
            $session['admin_login'] =1;
            //更新登陆时间登陆ip
            $data = [
                'login_time' => time(),
                'login_ip' => ip2long(Yii::$app->request->userIP),
            ];
            $this->updateAll($data, 'username = :user', [':user' => $this->username]);

            return (boolean)$session['admin_login'];//返回登陆状态
        }
        return false;

    }


    /**
     * @param $data
     * @return bool
     * 找回密码以及邮件发送
     * 本案例使用第三方邮件发送
     */
    public function seekPassword($data)
    {
        $this->scenario = 'seek';//验证场景机制
        if ($this->load($data) && $this->validate()) {
            $time = time();
            $token = $this->createToken($data['Admin']['username'], $time);
            $mailer = Yii::$app->mailer->compose('seekpassword', ['admin' => $data['Admin']['username'], 'time' => $time, 'token' => $token]);
            $mailer->setFrom('rickshop@163.com');//发件人邮件
            $mailer->setTo($data['Admin']['email']);//收件人邮件表单获取
            $mailer->setSubject('测试邮箱');//邮件主题
            if ($mailer->send())//邮件发送
            {
                return true;
            }
        }
        return false;
    }


    /**
     * @param $admin_user
     * @param $time
     * @return string
     * 生存token签名
     */
    public function createToken($admin, $time)
    {
        return md5(md5($admin) . base64_encode(Yii::$app->request->userIP) . md5($time));
    }


    /**
     * @param $data
     * @return bool|int
     * 更新密码模型
     */
    public function changePassword($data)
    {

        $this->scenario = 'changepass';
        if ($this->load($data) && $this->validate()) {
            return $this->updateAll(['password' => md5($this->password)], 'username = :user', [':user' => $this->username]);
        }
        return false;
    }


    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)){
            if($insert){
                $this->password = md5($this->password);
                $this->create_time = time();
            }else{
            }
            return true;
        }else{
            return false;
        }
    }


}