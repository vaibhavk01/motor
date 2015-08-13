<?php
namespace frontend\models;

use common\models\User;
use frontend\models\Dealer;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class DsignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $dealer;
    public $city;
    public $fname;
    public $lname;
    public $captcha;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
  
             ['city', 'required'],
              ['fname', 'string'],
               ['lname', 'string'],
               ['captcha', 'captcha'],
               ['captcha', 'required'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            
              $user = new user();
            	$user->username = $this->username;
            	$user->dealer =1;
            	$user->email = $this->email;
            	$user->city = $this->city;
            	$user->firstname = $this->fname;
            	$user->lastname = $this->lname;
            	$user->setPassword($this->password);
            	$user->generateAuthKey();
            	\Yii::$app->mailer->compose(['html' => 'auth-html'], ['user' => $user])
            	        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
            	        ->setTo($this->email)
            	        ->setSubject('Authenticate your account ' . \Yii::$app->name)
            	        ->send();
            	
            	if ($user->save()) {
            	    return $user;
            	}
            
        }

        return null;
    }
}
