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
 

class RequestFormindex extends Model
{
    public $brand;
    public $model_name;
     public $fuel;
   
    
    

    /**
     * @inheritdoc
     */
    public function rules()
    {  //$loginuser=Yii::$app->user->identity->username;
    
        return [
            ['brand', 'required','message'=>""],
             ['model_name', 'required','message'=>""],
           ['fuel', 'required','message'=>""],

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
        
        $query2 = (new Query())->select('username')->from('user')->where('city=:city AND dealer=:deal', array(':city'=>$this->city,':deal'=>1));
        $dealer=$query2->all();
            
            $flag=1;
            $car = $this->model_name;
            $use= new User();
            $user = Yii::$app->user->identity->username;
            $val = $use->findByUsername($user);
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
                        
               
            
            return null;
              
            	//$user->username = $this->username;
            
            
        }

        
    }
}
