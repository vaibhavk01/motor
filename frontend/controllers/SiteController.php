<?php
namespace frontend\controllers;

use Yii;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use common\models\LoginForm;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\Chat;
use frontend\models\DsignupForm;
use frontend\models\Showroom;
use frontend\models\Dealership;
use frontend\models\RequestForm;
use frontend\models\RequestFormindex;
use frontend\models\ReplyForm;
use frontend\models\Feedbackform;
use frontend\models\ContactForm;
use frontend\models\Car;
use frontend\models\Ncars;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Reply;
use frontend\models\Model;
use frontend\models\Carrequest;
use frontend\models\Servicecenter;
use frontend\models\Dealeraccount;
use frontend\models\Accessform;
use frontend\models\Colorform;
use yii\helpers\Json;
use frontend\models\Userrequest;



/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        
       
        
         $model = new SignupForm();
         $mod = new RequestFormindex();
         
        
         
       /*  if ($mod->load(Yii::$app->request->post())) {
         
         $mod1 = new RequestForm();
          $signup = new SignupForm();
          
          $query1 = (new Query())->select('model_name')->from('cars');
              $data1=$query1->all();
               $signup->brand=$mod->brand;
               $signup->model_name=$mod->model_name;
               $signup->fuel=$mod->fuel;
               
               $model_name=$mod->model_name;
               
               $email="vaibhav@vaxa-asia.com";
               
             \Yii::$app->mailer->compose(['html' => 'use-html'], ['user' => $signup])
                     ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . 'motormetric'])
                     ->setTo($email)
                     ->setSubject('Authenticate your account ' . \Yii::$app->name)
                     ->send();
               
              
               
               
       
         
         return $this->render('choose', [
             'model' => $mod1,
             'mod'=>$mod,
              'data1' => $data1,
              'signup'=>$signup,
              'model_name'=>$model_name,
             
         ]);
         
         
      
      
        }*/
        
        return $this->render('index', [
            'mod'=>$mod,
        ]);
        
        
        
    }
    
    public function actionChoose($car)
    {
    
      //  $query1 = (new Query())->select('model_name')->from('cars');
        //    $data1=$query1->all();
        
     //$query = (new Query())->select('username')->from('user')->where('dealer=1');
      //data=$query->all();


//      $dataProvider = new ActiveDataProvider([
  //        'query' => Car::find(),
    //  ]);
      
        
        
          //$model = new RequestForm();
           $signup = new SignupForm();
           
           
        
          
          if ($signup->load(Yii::$app->request->post())) {
          

          
            if ( $signup->signup2()) {
                      return $this->render('congrats',
                      [
                      'email'=>$signup->email,
                      
                      
                      ]
                      );
            
            
            $modlogin = new LoginForm();
            $modlogin->username=$signup->email;
            $modlogin->password=$signup->password;
            
        
           
           $user = $signup->email;
           $use= new User();
           
           
           $val = $use->findByUsername1($user);
           $auth=$val->status;
           
           $query2 = (new Query())->select('id,car_model,color,variant,city')->from('userrequest')->where('user_id=:id', array(':id'=>$val->id));
            $data2=$query->all();
              $dataProvider1 = new ActiveDataProvider([
                  'query' => $query,
              ]);
              
              $dataProvider2 = new ActiveDataProvider([
                  'query' => $query2,
              ]);
              
              
             $query3 = (new Query())->select('dealer_name,car_model,price,feature')->from('reply')->where('username=:username', array(':username'=>$user));
             $dataProvider3 = new ActiveDataProvider([
                 'query' => $query3,
             ]);
            
            
            
            
            
        
            return $this->render('userdashboard', [
               'dataProvider2'=>$dataProvider2,
                'dataProvider1'=>$dataProvider1,
                'dataProvider3'=>$dataProvider3,
                
                'data'=>$data,
                'data1'=>$data1,
                'data2'=>$data2,
                'user' => $user,
               // 'model' => $model,
                'auth' => $auth,
                
              
            ]);
            
            }
            }
            
            $signup = new SignupForm();
            
            $mod = new RequestFormindex();
            
            if ($mod->load(Yii::$app->request->post())) {
            				$signup->brand=$mod->brand;
            				$signup->model_name=$mod->model_name;
            				$signup->fuel=$mod->fuel;
            				
            				
            				$email="motormetric@gmail.com";
            				  
            				\Yii::$app->mailer->compose(['html' => 'use-html'], ['user' => $signup])
            				        ->setFrom([\Yii::$app->params['supportEmail'] =>'Home Page Request'])
            				        ->setTo($email)
            				        ->setSubject('Home Page Request' . \Yii::$app->name)
            				        ->send();
                
                return $this->render('choose', [
                    
                    //'model'=>$model,
                    'signup'=>$signup,
                ]);
            
            }
            
            $mod = new RequestFormindex();
            
            
            
            //$var = Car::find()->where(['modebrand' => $car])->one();
            $var = Ncars::find()->where(['modebrand' => $car])->one();
           
            $pieces = explode(" ", $car);
            
            if($var)
            {
            
           
           $signup->brand=$var->model;
           $signup->model_name=$var->model_name;
           
           $email="motormetric@gmail.com";
             
           \Yii::$app->mailer->compose(['html' => 'use-html'], ['user' => $signup])
                   ->setFrom([\Yii::$app->params['supportEmail'] => 'Home Page Request'])
                   ->setTo($email)
                   ->setSubject('Home Page Request')
                   ->send();
           
         

        
        return $this->render('choose', [
            'mod'=>$mod,
            'car'=>$car,
            'signup'=>$signup,
        ]);
        
       }
       
       else {
       
       	return $this->redirect('../index', [
       	    'mod'=>$mod,
       	]);
       }
    
    
    
    
    }
    
       public function actionChose()
        {
        
            $query1 = (new Query())->select('model_name')->from('cars');
                $data1=$query1->all();
            
         $query = (new Query())->select('username')->from('user')->where('dealer=1');
          $data=$query->all();
    
    
          $dataProvider = new ActiveDataProvider([
              'query' => Car::find(),
          ]);
          
            
            
              //$model = new RequestForm();
               $signup = new SignupForm();
            
              
              if ($signup->load(Yii::$app->request->post())) {
              
    
              
                if ( $signup->signup1()) {
                          return $this->render('index2');
                
              
                
                }
                }
            
              $signup = new SignupForm();
  
              $mod = new RequestFormindex();

            if ($mod->load(Yii::$app->request->post())) {
						$signup->brand=$mod->brand;
						$signup->model_name=$mod->model_name;
						$signup->fuel=$mod->fuel;
						
            
            return $this->render('chose', [
                'data1' => $data1,
                //'model'=>$model,
                'signup'=>$signup,
            ]);
        
        }
        
        
        
        }
    
    
    
    
    

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        
            return $this->render('dash');
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    
     public function actionAuthuser($token,$user)
        {
            $user=User::token($token);
            
             if ($user->firstname == $user)
             {
             $user->status=10;
             if($user->save())
             {
             return $this->render('authsucc');
             }
             }
    
            
        }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    
    
      public function actionViewdetails($id)
        {
        $query = (new Query())->select('*')->from('reply')->where('id=:id',array(':id'=>$id));
         
         
         
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
                $data1=$query->one();
        
        
        return $this->render('details', [
            'dataProvider' => $dataProvider,
            'req'=>$data1,
        ]);
        
        }
    
     public function actionFindcars($model)
        {
        

            
            $rows = Ncars::find()->select('model_name')->where(['model' => $model])->distinct(true)->all();
            
            
            
                   echo "<option  value>Select Model</option>";
            
                   if(count($rows)>0){
                       foreach($rows as $row){
                           echo "<option value='$row->model_name'>$row->model_name</option>";
                       }
                   }
                   else{
                       echo "<option>No Car Available</option>";
                   }
        }
        
        
        public function actionFindcarsvar($model,$mod,$mo)
           {
           
 
           
          $rows=Ncars::find()->select('variant')->where('model=:model AND model_name=:model_name AND fuel=:fuel', array (':model' => $mo,':model_name'=>$mod,'fuel'=> $model))->distinct(true)->all();
               
 
                              
               
                      echo "<option value>--- Select variant ---</option>";
               
                      if(count($rows)>0){
                          foreach($rows as $row){
                              echo "<option value='$row->variant'>$row->variant</option>";
                          }
                      }
                      else{
                          echo "<option>No Car Available</option>";
                      }
           }
           
           public function actionFindcarsfuel($model)
              {
              
              $query1 = (new Query())->select('fuel')->from('cars')->where('model_name=:model', array(':model'=>$model));
              $data1=$query1->all();
                  
                  $rows = Ncars::find()->select('fuel')->where(['model_name' => $model])->distinct(true)->all();
                  
                  
                  
                         echo "<option value>--- Select Fuel Type ---</option>";
                  
                         if(count($rows)>0){
                             foreach($rows as $row){
                                 echo "<option value='$row->fuel'>$row->fuel</option>";
                             }
                         }
                         else{
                             echo "<option>No Fuel Type</option>";
                         }
              }
              
              public function actionFindcarsfuel1($model,$mod)
                 {
                 
            
                     
                     $rows = Ncars::find()->select('fuel')->where(['model_name' => $model])->distinct(true)->all();
                     
                     
                     
                            echo "<option value>Select Fuel Type</option>";
                     
                            if(count($rows)>0){
                                foreach($rows as $row){
                                    echo "<option value='$row->fuel'>$row->fuel</option>";
                                }
                            }
                            else{
                                echo "<option>No Fuel Type</option>";
                            }
                 }
                 
                 
             public function actionFindcarscolor($var,$mod,$brand,$fuel)
                      {
                      
                 
                          
 $rows=Ncars::find()->where('model=:model AND model_name=:model_name AND fuel=:fuel AND variant=:var', array (':model' => $brand,':model_name'=>$mod,'fuel'=> $fuel,'var'=>$var))->distinct(true)->all();                          
                          
                          
                                 echo "<option value>--- Select Color ---</option>";
                          
                                 if(count($rows)>0){
                                     foreach($rows as $row){
                                         echo "<option value='$row->color'>$row->color</option>";
                                     }
                                 }
                                 else{
                                     echo "<option>No Fuel Type</option>";
                                 }
                      }
              
              
              
    
    
        public function actionReplydealer($id)
        {
         $user = Yii::$app->user->identity->username;
         $query2 = (new Query())->select('car_model,color,variant,city')->from('userrequest')->where('id=:id', array(':id'=>$id));
         $data2=$query2->one();
         
         $query = (new Query())->select('dealer_name,dealer_id,car_model,price,feature')->distinct(true)->from('reply')->where('username=:username AND userreq_id=:request_id AND car_model=:car_model', array(':username'=>$user,'request_id'=>$id,'car_model'=>$data2['car_model']));
         $data=$query->all();
         
         $query2 = (new Query())->select('dealer_name')->distinct(true)->from('reply')->where('userreq_id=:id', array(':id'=>$id));
         $data3=$query2->all();
         
    		 return $this->render('requestreply', [
    		     
    		     'data'=>$data,
    		     'data1'=>$data3,
    		     'id'=>$id,
    		    
    		     'user'=>$user,
    		 ]);
    		 
    		 
    		 
         }
    
    
     public function actionDashboard()
        {
            $user = Yii::$app->user->identity->username;
            $use= new User();
            $val = $use->findByUsername1($user);
            $auth=$val->status;
            if ($val->dealer)
            {
            $query2 = (new Query())->select('id,user_name,car_model')->from('carrequest')->where('dealer_id=:id', array(':id'=>$val->id));
            $dataProvider = new ActiveDataProvider([
                'query' => $query2,
            ]);
            
            $query = (new Query())->select('username,car_model,price,feature')->from('reply')->where('dealer_id=:id', array(':id'=>$val->id));
            $dataProvider1 = new ActiveDataProvider([
                'query' => $query,
            ]);
           
           $comp="test";
            return $this->render('dealerdashboard', [
                
                'dataProvider'=>$dataProvider,
                'dataProvider1'=>$dataProvider1,
                'comp'=>$comp,
              
              
                 'user' => $user,
                 'auth'=>$auth,
               
            ]);
            }
            else {
            
            $query = (new Query())->select('username')->from('user')->where('dealer=1');
            $data=$query->all();
            
            $query2 = (new Query())->select('id,car_model,color,variant,city')->from('userrequest')->where('user_id=:id', array(':id'=>$val->id));
            $data2=$query->all();
            
            $query1 = (new Query())->select('model_name')->from('cars');
            $data1=$query1->all();
            
            $dataProvider = new ActiveDataProvider([
                'query' => Car::find(),
            ]);
            
            $dataProvider1 = new ActiveDataProvider([
                'query' => $query,
            ]);
            
            $dataProvider2 = new ActiveDataProvider([
                'query' => $query2,
            ]);
            
            
					$query3 = (new Query())->select('dealer_name,car_model,price,feature')->from('reply')->where('username=:username', array(':username'=>$user));
           $dataProvider3 = new ActiveDataProvider([
               'query' => $query3,
           ]);
            
                    $model = new RequestForm();
                  
                 
            
            	return $this->render('userdashboard', [
            	   'dataProvider'=>$dataProvider,
            	    'dataProvider2'=>$dataProvider2,
            	    'dataProvider1'=>$dataProvider1,
            	    'dataProvider3'=>$dataProvider3,
            	    'data'=>$data,
            	    'data1'=>$data1,
            	    'user' => $user,
            	    'model' => $model,
            	    'auth'=>$auth,
            	  
            	]);
            	}

            
        }
        

public function actionReply($id)
{
$model = new ReplyForm();
            $user = Yii::$app->user->identity->username;

//$id = Yii::app()->request->getParam('id');
$use= new User();
$val = $use->findByUsername($user);
 
  if ($model->load(Yii::$app->request->post())) {
     if ($user1 = $model->signup($id)) {
     
     $comp=$user1->access;
             $query2 = (new Query())->select('id,user_name,car_model')->from('carrequest')->where('dealer_id=:id', array(':id'=>$val->id));
              $dataProvider = new ActiveDataProvider([
                  'query' => $query2,
              ]);
              
              $query = (new Query())->select('username,car_model,price,feature')->from('reply')->where('dealer_id=:id', array(':id'=>$val->id));
              $dataProvider1 = new ActiveDataProvider([
                  'query' => $query,
              ]);
             
              return $this->render('dealerdashboard', [
                  
                  'dataProvider'=>$dataProvider,
                  'dataProvider1'=>$dataProvider1,
                  'comp'=>$comp,
                  
                
                
                   'user' => $user,
                 
              ]);
         
     }
     }

return $this->render('reply', [
    'model' => $model,
]);



}

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        $em="motormetric@gmail.com";
            if ($model->sendEmail($em)) {
            return $this->render('thank');
                
           // ]);
            //    Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->render('congrats');
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
    
     public function actionDsignup()
        {
            $model = new DsignupForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->render('congrats');
                    }
                }
            }
    
            return $this->render('dsignup', [
                'model' => $model,
            ]);
        }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->getSession()->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->getSession()->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->getSession()->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    
    public function actionTest()
    {
    return $this->renderAjax('_test');
    
    }
    
    public function actionDetails($quote)
    {
    
    $chat= new Chat();
     if ($chat->load(Yii::$app->request->post())) {
     $use= new User();
     $user = Yii::$app->user->identity->username;
     $val = $use->findByUsername1($user);
     $chat->user_id=$val->id;
     $chat->request_id=$quote;
     
     $reqs=Carrequest::find()->where('id=:id', array ('id' => $quote))->one();
     $chat->dealer_id=$reqs->dealer_id;
     $chat->sent=2;
     
     if($chat->save()){
     $chat->message="";
     return $this->render('detail', [
         'quote' => $quote,
     ]);
     
     }
    }
   return $this->render('detail', [
       'quote' => $quote,
   ]);
   
   
    
    }
    
    public function actionFeedback()
     {
      $feed=new Feedbackform();
      $use= new User();
      $user = Yii::$app->user->identity->username;
      $val = $use->findByUsername1($user);
      if ($feed->load(Yii::$app->request->post())) {

      return $this->render('dash', [
          'quote' => $quote,
      ]);

    }
    
    return $this->render('feedback', [
        'feed' => $feed,
    ]);
    
    
     
     }
     
     public function actionAddcar()
          {
           
         
         return $this->renderAjax('addcar');
         
          
          }
    
    public function actionLinkForm() {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
     
     
            $res = array(
                'body'    => print_r($_POST, true),
                'success' => true,
            );
     
            return $res;
        }
    }
    
    
    public function actionCreatedealer()
        {


					        $modelDealership = new Dealership;
					        $dealer = new Dealeraccount;
					        $modelsShowroom = [new Showroom];
					        $modelsService = [new Servicecenter];
					        if ($modelDealership->load(Yii::$app->request->post())) {
					          $dealer->load(Yii::$app->request->post());
					
					            $modelsShowroom = Model::createMultiple(Showroom::classname());
					            Model::loadMultiple($modelsShowroom, Yii::$app->request->post());
					            
					            $modelsService = Model::createMultiple(Servicecenter::classname());
					            Model::loadMultiple($modelsService, Yii::$app->request->post());
					
					            // ajax validation
					            if (Yii::$app->request->isAjax) {
					                Yii::$app->response->format = Response::FORMAT_JSON;
					                return ArrayHelper::merge(
					                    ActiveForm::validateMultiple($modelsShowroom),
					                    ActiveForm::validate($modelDealership)
					                );
					            }
					
					            // validate all models
					            $valid = $modelDealership->validate();
					            $valid = Model::validateMultiple($modelsShowroom) && $valid;
					
					            if ($valid) {
					                $transaction = \Yii::$app->db->beginTransaction();
					                try {
					                    if ($flag = $modelDealership->save(false)) {
					                    $dealer->dealership_id=$modelDealership->id;
					                    
					                    if (! ($flag = $dealer->save(false))) {
					                        $transaction->rollBack();
					                        break;
					                    }
					                    
					                        foreach ($modelsShowroom as $modelShowroom) {
					                            $modelShowroom->dealer_id = $modelDealership->id;
					                            
					                            if (! ($flag = $modelShowroom->save(false))) {
					                                $transaction->rollBack();
					                                break;
					                            }
					                        }
					                        foreach ($modelsService as $modelService) {
					                            $modelService->dealer_id = $modelDealership->id;
					                            if (! ($flag = $modelService->save(false))) {
					                                $transaction->rollBack();
					                                break;
					                            }
					                        }
					                        
					                        
					                    }
					                    if ($flag) {
					                        $transaction->commit();
					                        return $this->redirect(['view', 'id' => $modelDealership->id]);
					                    }
					                } catch (Exception $e) {
					                    $transaction->rollBack();
					                }
					            }
					        }
    
            return $this->render('createdealer', [
                'modelDealership' => $modelDealership,
                'dealer' => $dealer,
                'modelsShowroom' => (empty($modelsShowroom)) ? [new Showroom] : $modelsShowroom,
                'modelsService' => (empty($modelsSc)) ? [new Servicecenter] : $modelsSc
                
            ]);
        }
    
        /**
         * Updates an existing Dealership model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         */
        public function actionUpdatedealer($id)
        {
            $modelDealership = $this->findModel($id);
            $modelsShowroom = $modelDealership->Showroomes;
    
            if ($modelDealership->load(Yii::$app->request->post())) {
            
    
                $oldIDs = ArrayHelper::map($modelsShowroom, 'id', 'id');
                $modelsShowroom = Model::createMultiple(Showroom::classname(), $modelsShowroom);
                Model::loadMultiple($modelsShowroom, Yii::$app->request->post());
                $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsShowroom, 'id', 'id')));
    
                // ajax validation
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ArrayHelper::merge(
                        ActiveForm::validateMultiple($modelsShowroom),
                        ActiveForm::validate($modelDealership)
                    );
                }
    
                // validate all models
                $valid = $modelDealership->validate();
                $valid = $modelDealeraccount->validate();
                $valid = Model::validateMultiple($modelsShowroom) && $valid;
    
                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if (($flag = $modelDealership->save(false))&&($flag = $modelDealeraccount->save(false))) {
                            if (! empty($deletedIDs)) {
                                Showroom::deleteAll(['id' => $deletedIDs]);
                            }
                            foreach ($modelsShowroom as $modelShowroom) {
                                $modelShowroom->Dealership_id = $modelDealership->id;
                                if (! ($flag = $modelShowroom->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }
                            
                            
                        }
                        if ($flag) {
                            $transaction->commit();
                            return $this->redirect(['view', 'id' => $modelDealership->id]);
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
                }
            }
    
            return $this->render('update', [
                'modelDealership' => $modelDealership,
                'modelsShowroom' => (empty($modelsShowroom)) ? [new Showroom] : $modelsShowroom,
                'modelsService' => (empty($modelsService)) ? [new Service] : $modelsService
      
          
            ]);
        }
        
        public function actionQuote($quote)
        {
        $model = new ReplyForm();
    
        $access = [new Accessform];
        $color = [new Colorform];
        
        
        $mod="";
        
                 $pieces = explode("-", $quote);
                  
                  $var = User::find()->where(['dealerid' => $pieces[0]])->one();
                  $var1 = Userrequest::find()->where(['user_id' => $var->id])->one();
                  $cars = Car::find()->where(['id' => $var1->car_id])->one();
        
        
        
        if ($model->load(Yii::$app->request->post())) {
        
        $access = Model::createMultiple(Accessform::classname());
        Model::loadMultiple($access, Yii::$app->request->post());
        
        foreach ($access as $acc) {
        
        $mod=$mod.$acc->access.":".$acc->price."#";
        
        
        }
        
        $email="motormetric@gmail.com";
        \Yii::$app->mailer->compose(['html' => 'dealer-html'], ['reply' => $model,'access'=>$mod,'quote'=>$quote,'var'=>$var,'var1'=>$var1,'cars'=>$cars])
                ->setFrom([\Yii::$app->params['supportEmail'] =>'New Quote from Dealer'])
                ->setTo($email)
                ->setSubject('New Quote from Dealer' )
                ->send();
        
        return $this->render('thankd',[
        'reply' => $model,
        'access'=>$mod,
        'quote'=>$quote,
        'var'   => $var,
        'var1'  => $var1,
        'cars'  => $cars,
        
        
        ]);
        
        }

        return $this->render('quote', [
            'model' => $model,
            'quote' => $quote,
            'var'   => $var,
            'var1'  => $var1,
            'cars'  => $cars,
            'Maccess' => (empty($modelsAccessform)) ? [new Accessform] : $modelsAccessform,
            'Colors' => (empty($modelsColorform)) ? [new Colorform] : $modelsColorform
            
        ]);
        
        
        
        }
        
        public function actionCarlist($q = null) {
            $query = new Query;
            
            $query->select('modebrand')
                ->from('cars')
                ->where('modebrand LIKE "%' . $q .'%"')
                ->distinct('true')
                ->orderBy('modebrand');
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out = [];
            foreach ($data as $d) {
                $out[] = ['value' => $d['modebrand']];
            }
            echo Json::encode($out);
        }
        
        
        
        public function actionNotify($email = null) {
        
        
        $em="motormetric@gmail.com";
        			  
        			\Yii::$app->mailer->compose(['html' => 'signup-html'], ['email' => $email])
        			        ->setFrom([\Yii::$app->params['supportEmail'] =>'New Signup'])
        			        ->setTo($em)
        			        ->setSubject('New Signup')
        			        ->send();
        
        return $this->render('thank1', [
            
            //'model'=>$model,
          
        ]);
 
    
    }
    
    
    public function actionNot($email = null) {
           
           
           $em="motormetric@gmail.com";
           			  
           			\Yii::$app->mailer->compose(['html' => 'signupnew-html'], ['email' => $email])
           			        ->setFrom([\Yii::$app->params['supportEmail'] =>'New Car Select'])
           			        ->setTo($em)
           			        ->setSubject('New Car Select')
           			        ->send();
           
           return true;
    
       
       }
}
