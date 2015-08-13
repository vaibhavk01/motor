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
use frontend\models\Ncars;
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
    public $tdrive;
    public $feedback;

    
    

    /**
     * @inheritdoc
     */
     
     public function attributeLabels()
     {
         return [
             'fname' => 'First Name',
             'lname' => 'Last Name',
             'model' => 'Model',
             'tdrive' => 'Test Drive',
         ];
     }
     
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
					//	['email', 'unique','targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['email', 'email' , 'message' => 'Please enter a valid email address.'],
             ['email', 'required','message'=>'Please enter a valid email address.'],

         
              ['fname', 'required','message'=>'Please enter your First Name.'],
    				 // ['phone', 'number'],
              //['phone', 'required'],
              
               ['lname', 'required','message'=>'Please enter your Last Name.'],
                ['brand', 'string'],
                 ['model_name', 'string'],
                ['fuel', 'string'],
                ['city', 'string'],
                ['brand', 'required', 'message'=>'Please select the City.'],
                
                
                 ['brand', 'required', 'message'=>'Please select the Brand.'],
                 ['model_name', 'required', 'message'=>'Please select the Model.'],
                 ['fuel', 'required', 'message'=>' Please select the Fuel.'],
                  ['variant', 'required','message'=>'Please select the Variant.'],
                 [['color'],'string','max'=>75],
                  ['color', 'required', 'message'=>'Please enter car color of your choice.'],
                  ['color', 'match', 'pattern' => '/^[a-z A-Z ]+$/', 'message' => 'Please enter only letters.'],
                  
                 // ['delivery', 'required','message'=>'Please select the Delivery.'],
                  ['other', 'string','max'=>1000],
                 
                   
                   ['tdrive', 'required', 'message'=>'Please select the Test Drive option.'],
                   //  ['password', 'required'],

                        ['captcha', 'captcha'],
                        
                         ['feedback', 'string','max'=>1000],
                        
                        
                        ['phone', 'number','message' => '10 digit cell phone number required.'],
                        ['phone', 'string','min'=>10,'max'=>10,'tooShort' => '10 digit cell phone number required.','tooLong' => '10 digit cell phone number required.' ],
                        //  [['phone'],'number','min'=>10,'max'=>100],
                        
                        ['phone', 'required','message'=>'10 digit cell phone number required.'],
                        
      
                     //     ['captcha', 'required'],
                       //   ['password_repeat', 'required'],
                          
                       //    ['password_repeat', 'compare','compareAttribute'=>'password','message'=>'Passwords do not match'],
                          
         

             
           
            
            
             
           
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
     	$user->phone = $this->phone;
     	$user->setPassword($this->password);
     	$user->generateAuthKey();
     	
     	$transaction = \Yii::$app->db->beginTransaction();
    
     	
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
     	  
     	   $row=Ncars::find()->where('model=:model AND model_name=:model_name AND fuel=:fuel AND variant=:variant AND color=:color', array (':model' => $this->brand,':model_name'=>$this->model_name,'fuel'=> $this->fuel,'variant'=>$this->variant,$this->color))->one();
     	   
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
     
     
      public function signup2()
      {
      if ($this->validate()) {
      
       $user = new user();
      
        $user->username = $this->email;
      	
      	$user->email = $this->email;
      	
      	$user->firstname = $this->fname;
      	$user->lastname = $this->lname;
      	$user->phone = $this->phone;
      	$user->setPassword($this->email);
      	$user->generateAuthKey();
      	$transaction = \Yii::$app->db->beginTransaction();
      	
     	
      	if ($flag = $user->save(false))
      	
      	{
      	
      	$email="motormetric@gmail.com";
      	
      	\Yii::$app->mailer->compose(['html' => 'auth-html'], ['user' => $this])
      	        ->setFrom([\Yii::$app->params['supportEmail'] => 'New Quote request' ])
      	        ->setTo($email)
      	        ->setSubject('New Quote request')
      	        ->send();
      	        
      	  $date=Yii::$app->formatter->asDatetime(date('Y-d-m h:i:s'));
      	  $car = new Car();
      	  
      	  //$model_name=$this->$model_name;
      	  
      	  $row=Ncars::find()->where('model=:model AND model_name=:model_name AND fuel=:fuel AND variant=:variant AND color=:color', array (':model' => $this->brand,':model_name'=>$this->model_name,'fuel'=> $this->fuel,'variant'=>$this->variant,'color'=>$this->color))->one();
      	   
      	   $user=User::find()->where('email=:email',array(':email'=>$this->email))->one();
      	   
      	    $urequest= new Userrequest();
      	    
      	    $urequest->car_id = $row->id;
      	    $urequest->user_id = $user->id;
      	    $urequest->color = $this->color;
      	    $urequest->city = "Chennai";
      	    $urequest->other = $this->other;
      	    $urequest->delivery = "not mentioned";
      	    $urequest->status = 0;
      	    $urequest->time = $date;
      	    
      	    if($flag = $urequest->save(false))
      	 {$transaction->commit();
           return $user;
           
           }
      }
      else {
      $transaction->rollback();
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
