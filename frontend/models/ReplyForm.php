<?php
namespace frontend\models;

use common\models\User;
use frontend\models\Dealer;
use frontend\models\Dealerreply;
use frontend\models\Carrequest;
use yii\base\Model;
use Yii;
use yii\db\Query;

/**
 * Signup form
 */
class ReplyForm extends Model
{
    public $price;
    public $feature;
    public $roadt;
    public $handc;
    public $compin;
    public $depin;
    public $engc;
    public $rtoinv;
    public $cashs;
    public $cashd;
    public $compa;
    public $comps;
    public $sname;
    public $scontact;
    public $other;
    public $fuel;
    public $comp;
    public $insurance;
    public $dname;
    public $dperson;
    public $dcontact;
    public $final;
    public $terms;
    public $delivery;
    public $cars;
    public $var;
    public $var1;
    public $regis;
    public $roads;
    public $casho;
    public $interest;
    public $bank;
    public $bamount;
    public $brefund;
    public $bcancel;
    public $pmode;
    public $c1;
    public $c2;
    public $c3;
    public $c4;
    public $d1;
    public $d2;
    public $d3;
    public $d4;
     
    
    
    

    /**
     * @inheritdoc
     */
     
     public function attributeLabels()
     {
         return [
             'comp' => 'Complimentary',
             
         ];
     }
    public function rules()
    {
        return [
         
            ['bamount', 'string'],
            ['brefund', 'string'],
            ['bcancel', 'string'],
            ['pmode', 'string'],
            ['price', 'string'],
            ['roadt', 'string'],
            ['handc', 'string'],
            ['compin', 'string'],
            ['depin', 'string'],
            ['engc', 'string'],
            ['rtoinv', 'integer'],
            ['cashs', 'string'],
            ['cashd', 'string'],
            ['final', 'string'],
            ['regis', 'string'],
            ['roads', 'string'],
            ['casho', 'string'],
            
             ['c1', 'string'],
             ['c2', 'string'],
             ['c3', 'string'], 
             ['c4', 'string'],

						['d1', 'string'],
						['d2', 'string'],
						['d3', 'string'], 
						['d4', 'string'],
						['bank', 'string'], 
						['interest', 'string'],               
             
                
            ['delivery', 'string'],
            ['terms', 'string'],
            
            ['feature', 'required'],
            ['scontact','integer'],
             ['sname','string'],
             ['other','string'],
             ['fuel','integer'],
              ['compa','required'],
               ['comps','required'],
                ['insurance','string'],
                ['regis', 'required','message' =>"Please enter the Registration Price."],
                ['roads', 'required','message' =>"Please enter the Road Safety Tax."],
                ['price','required','message' =>"Please enter the Ex-Showroom Price."],
                ['roadt','required','message' =>"Please enter the Road Tax."],
                ['handc','required','message' =>"Please enter the Handling Charges."],
                ['dperson','required','message' =>"Please enter the Contact Person's Name."],
                ['dname','required','message' =>"Please enter the Dealership's Name."],
               
                 
                 ['dcontact', 'number','message' => '10 digit cell phone number required.'],
                 ['dcontact', 'string','min'=>10,'max'=>10,'tooShort' => '10 digit cell phone number required.','tooLong' => '10 digit cell phone number required.' ],
                 //  [['phone'],'number','min'=>10,'max'=>100],
                 
                 ['dcontact', 'required','message'=>'10 digit cell phone number required.'],
                 ['terms', 'required','message'=>'Please enter Terms and Conditions.'],
                 ['delivery', 'required','message'=>'Please enter Delivery time.'],
                 ['final', 'required','message'=>'Please click View Price to populate the final price.'],
                 
                 
                 
                 
                 
            
    
            

     
  
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup($id)
    {
        if ($this->validate()) {
            
            $flag=1;
            $request= new Reply();
            $carr= new Carrequest();
            $query2 = (new Query())->select('user_name,dealer_name,car_model,request_id')->from('carrequest')->where('id=:id', array(':id'=>$id));
            $data2=$query2->one();
						$use= new User();
            $user = Yii::$app->user->identity->username;
            $val = $use->findByUsername($user);
            $userr = $use->findByUsername($data2['user_name']);
            $request->username=$data2['user_name'];
            $request->car_model=$data2['car_model'];
            $request->dealer_name=$data2['dealer_name'];
            $request->dealer_id = $val->id;
            $request->request_id = $id;
            $request->userreq_id = $data2['request_id'];
            $request->feature = $this->feature;
            $request->price = $this->price.','.$this->roadt.','.$this->handc.','.$this->compin.','.$this->depin.','.$this->engc.','.$this->rtoinv.','.$this->cashs.','.$this->cashd;
            
            $com=$this->compa;
            $com1=$this->comps;
            
           
             
            $access="access";
            $service="service";
            
            foreach($com as $acom)
           	{
           	
           	$access=$access.','.$acom;
           	
           	}
           	
           foreach($com1 as $acom1)
           		{
           		
           		$service=$service.','.$acom1;
           		
           		
           		}
           		
           		$request->access=$access;
           		$request->service=$service;
              $request->other=$this->other;
              $request->fuel=$this->fuel;
              $request->sname=$this->sname;
              $request->scontact=$this->scontact;
              
               $dreply= new Dealerreply();
               $dreply->username=$data2['user_name'];
               $dreply->dealer_name=$data2['dealer_name'];
               $dreply->request_id = $data2['request_id'];
               
            
            if (($request->save()) && ($dreply->save()) )
            {
            
            
            \Yii::$app->mailer->compose(['html' => 'requestreply-html'], ['user' => $userr,'req'=>$request])
                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setTo($userr->email)
                    ->setSubject('New Reply ' .$request->car_model )
                    ->send();
                  
            
             return $request;
            }
            

                        
               
            
            return null;
              
            	//$user->username = $this->username;
            
            
        }

        
    }
}
