<?php
namespace frontend\models;


use common\models\User;
use frontend\models\Dealer;
use frontend\models\Carrequest;
use frontend\models\Userrequest;
use yii\base\Model;
use Yii;

use yii\db\Query;

use yii\data\ActiveDataProvider;
use common\models\LoginForm;

use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\RequestForm;
use frontend\models\ReplyForm;
use frontend\models\ContactForm;
use frontend\models\Car;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $number;
    public $dealer;
    public $fname;
    public $lname;
    public $captcha;
    public $brand;
    public $city;
    public $variant;
    public $model_name;
    public $color;
    public $delivery;
    public $loginuser ;
    public $other ;
    public $fuel ;
    public $check ;
    public $phone;

    
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           /*
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            */
						['email', 'filter', 'filter' => 'trim'],
						['email', 'unique','targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['email', 'email'],

         
              ['fname', 'required'],
    				  ['phone', 'number'],
              ['phone', 'required'],
              
               ['lname', 'required'],
                ['brand', 'string'],
                 ['model_name', 'string'],
                ['fuel', 'string'],
                
                 ['brand', 'required'],
                 ['model_name', 'required'],
                 ['fuel', 'required'],
                  ['variant', 'required'],
                  
                  ['color', 'required'],
                  
                  ['delivery', 'required'],
                  ['other', 'required'],
                 
                   ['city', 'required'],
                     ['password', 'required'],

                        ['captcha', 'captcha'],
                          ['captcha', 'required'],
                          ['password_repeat', 'required'],
                          
                           ['password_repeat', 'compare','compareAttribute'=>'password','message'=>'Passwords do not match'],
                          
         

             
           
            
            
             
           
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
     
     public function signup1()
     {
     if ($this->validate()) {
     
     $user = new user();
     
     	$user->username = $this->email;
     	
     	$user->email = $this->email;
     	
     	$user->firstname = $this->fname;
     	$user->lastname = $this->lname;
     	$user->setPassword($this->password);
     	$user->generateAuthKey();
     	
    
     	
     	if ($user->save())
     	
     	{
     	
     	\Yii::$app->mailer->compose(['html' => 'auth-html'], ['user' => $user])
     	        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
     	        ->setTo($this->email)
     	        ->setSubject('Authenticate your account ' . \Yii::$app->name)
     	        ->send();
     	        
     	  $date=Yii::$app->formatter->asDatetime(date('Y-d-m h:i:s'));
     	  $car = new Car();
     	  
     	  //$model_name=$this->$model_name;
     	  
     	   $row=Car::find()->where('model=:model AND model_name=:model_name AND fuel=:fuel AND variant=:variant', array (':model' => $this->brand,':model_name'=>$this->model_name,'fuel'=> $this->fuel,'variant'=>$this->variant))->one();
     	   
     	   $user=User::find()->where('email=:email',array(':email'=>$this->email))->one();
     	   
     	    $urequest= new Userrequest();
     	    
     	    $urequest->car_id = $row->id;
     	    $urequest->user_id = $user->id;
     	    $urequest->color = $this->color;
     	    $urequest->city = $this->city;
     	    $urequest->other = $this->other;
     	    $urequest->delivery = $this->delivery;
     	    $urequest->status = 0;
     	    $urequest->time = $date;
     	    
     	    if($urequest->save())
     	 {
          return $user;
          
          }
     }
     else {
     	return null;
     }
     }
     }
    public function signup()
    {
        if ($this->validate()) {
        
            return $user;
              $user = new user();
              
            	$user->username = $this->email;
            	
            	$user->email = $this->email;
            	
            	$user->firstname = $this->fname;
            	$user->lastname = $this->lname;
            	$user->setPassword($this->password);
            	$user->generateAuthKey();
            	
            	\Yii::$app->mailer->compose(['html' => 'auth-html'], ['user' => $user])
            	        ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . 'motormetric'])
            	        ->setTo($this->email)
            	        ->setSubject('Authenticate your account ' . \Yii::$app->name)
            	        ->send();
            	
            	if ($user->save()) {
            	
            	
            	
            	$query2 = (new Query())->select('username')->from('user')->where('city=:city AND dealer=:deal', array(':city'=>$this->city,':deal'=>1));
            	$dealer=$query2->all();
            	    
            	    $flag=1;
            	    $car = $this->model_name;
            	    $use= new User();
            	    $user = $this->email;
            	    $val = $use->findByUsername1($user);
            	    $color = $this->color;
            	    $variant = $this->variant;
            	    $city = $this->city;
            	    $otherr= $this->otherr;
            	    $delivery = $this->delivery;
            	    $urequest= new Userrequest();
            	    $urequest->car_model = $car;
            	    $urequest->user_id = $val->id;
            	    $urequest->username = $val->username;
            	    $urequest->color = $color;
            	    $urequest->variant = $variant;
            	    $urequest->city = $city;
            	    $urequest->otherr = $otherr;
            	    $urequest->delivery = $delivery;
            	    $urequest->save();
            	    
            	    \Yii::$app->mailer->compose(['html' => 'request-html'], ['user' => $val,'req'=>$urequest])
            	            ->setFrom([\Yii::$app->params['supportEmail'] => 'motormetric' . ' robot'])
            	            ->setTo($val->email)
            	            ->setSubject('Your Request ' .$urequest->car_model )
            	            ->send();
            	    
            	    
            	    foreach ($dealer as $deal) 
            	    {
            	     
            	    $request= new Carrequest();
            	   
            	    $val1 = $use->findByUsername1($deal['username']);
            	    
            	    $request->car_model = $car;
            	    $request->user_id = $val->id;
            	     $request->user_name = $val->username;
            	    $request->dealer_name = $deal['username'];
            	    $request->color = $color;
            	    $request->variant = $variant;
            	    $request->city = $city;
            	   
            	    
            	    $request->dealer_id = $val1->id;
            	    $request->request_id = $urequest->id;
            	    $request->otherr = $urequest->otherr;
            	    \Yii::$app->mailer->compose(['html' => 'requestd-html'], ['user' => $val,'req'=>$urequest,'deal'=>$val1])
            	            ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name])
            	            ->setTo($val1->email)
            	            ->setSubject('New Request ' .$urequest->car_model )
            	            ->send();
            	           
            	    if (!($request->save()))
            	    {
            	    $flag=0;
            	    }
            	    
            	    }
            	    
            	    	if ($flag) {
            	     $request= new Carrequest();
            	                	    return $request;
            	                	}
            	
            	
            	    return $user;
            	}
            
        }

        return null;
    }
}
