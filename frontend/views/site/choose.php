<script>
function ajax(){
  alert("vaibhav");
}

</script>


<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\Car;
use frontend\models\Ncars;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\helpers\Url;
use yii\captcha\Captcha;


/* @var $this yii\web\View */
$this->title = 'My Yii Application';

$color = [
    "black" => "black",
    "grey" => "grey",
    "white" => "white",
    "other" => "other",
    
];

$signup->city="Chennai";
$city = [
    "Chennai" => "Chennai",
    
];

$fuel = [
    "Petrol" => "Petrol",
    "Diesel" => "Diesel",
    "CNG"=>"CNG",
    
];

$delivery = [
    "In 1 Week" => "In 1 Week",
    "In 2 Week" => "In 2 Week",
    "In 3 Week" => "In 3 Week",
    "In 4 Week" => "In 4 Week",
    "In 4 Week" => "In 5 Week",
    "In 6 Week" => "In 6 Week",
    "More than 6 Week" => "More than 6 Week",
    
    
];

$blank = [
];


$test = [
    "Yes" => "Yes",
    "No" => "No",
    "Test Drive Needed"=>"I want a test-drive",
    
];

?>


<div class="site-index" style="width: 80%; margin-left: 8%; margin-top: 150px;">

<div class="row">

<div class="col-lg-4">
        <h3  style="margin-top: 30px;" >Choose Your New Car</h3>
        
 </div>
 
 <div class="col-lg-6 pull-right">
         <p  style="margin-top: 35px;color: grey; font-family: lucida sans,sans-serif;" >This helps dealers build the best quotes for you.</p>
         
  </div>
  
  </div>
  
 
 <div class="row">
 <div class="col-lg-10">
        <hr style="margin-top: 0px;width: 96%;margin-left: 3px;">
 </div>
</div>

 
    <?php 
    
    $form = ActiveForm::begin(['id' => 'login-form']);
    ?>
    
    <div class="row">

    
         <div class="col-lg-5">

             <?php  
             
             //$estado = ArrayHelper::map(Car::find()->all(), 'model', 'model');
             
             $estado = ArrayHelper::map(Ncars::find()->select('model')->distinct('true')->orderby('model')->all(), 'model', 'model');
             
             $estad = array_shift($estado );
            
            
             
                    echo $form->field($signup, 'brand')->dropDownList(
                            $estado,
                            
                            
                            [
                            'test1=$(this).val();',
                                'prompt'=>'Select your Brand',
                                'test1=$(this).val();',
                                'onchange'=>'
                                    $.get( "'.Url::toRoute('/site/findcars').'", { model: $(this).val() } )
                                        .done(function( data ) {
                                            $("select#'.Html::getInputId($signup, 'model_name').'").html( data );
                                        }
                                    );
                                    
                                    test1=$(this).val();
                                '    
                            ]
                    )->label('Brand*'); 
             
             
                 
             
             
             
             ?>
             
             <?php
             
              $estado1 = ArrayHelper::map(Ncars::find()->where('model = :model_name', [':model_name' => $signup->brand])->all(), 'model_name', 'model_name');
             
              
             echo $form->field($signup, 'model_name')->dropDownList(
                     $estado1, 
                     [
                         //'prompt'=>'Select your Model',
                         	'test=$(this).val();',
                         'onchange'=>'
                             $.get( "'.Url::toRoute('/site/findcarsfuel').'", { model: $(this).val() } )
                                 .done(function( data ) {
                                     $("select#'.Html::getInputId($signup, 'fuel').'").html( data );
                                 }
                                 
                             );
                             
                             test=$(this).val();
                         '    
                     ]
             )->label('Model*');
             
             
             
             
             
             ?>
             
             <?php
             
             $estado4 = ArrayHelper::map(Ncars::find()->where('modebrand = :mode', [':mode' => $car])->all(), 'fuel', 'fuel');
 
              
             
             echo $form->field($signup, 'fuel')->dropDownList(
                     $estado4, 
                     [
                         'prompt'=>'--- Select Fuel ---',
                         	
                         'onchange'=>'
                         
                         y=$("select#signupform-model_name").val();
                         y1=$("select#signupform-brand").val();
                         
                         
                          
                             $.get( "'.Url::toRoute('/site/findcarsvar').'", { model: $(this).val(),mod:'."y".' ,mo:'."y1".' } )
                                 .done(function( data ) {
                                     $("select#'.Html::getInputId($signup, 'variant').'").html( data );
                                 }
                             );
                         '     
                     ]
             )->label('Fuel*');
             
             
             
             
             
             ?>
             
             <?php

              //$estado3= ArrayHelper::map(Car::find()->where('model=:model AND model_name=:model_name AND fuel=:fuel', array (':model' => $signup->brand,':model_name'=>$signup->model_name,'fuel'=> $signup->fuel))->all(), 'variant', 'variant');
              
             $estado3 = ArrayHelper::map(Ncars::find()->where('modebrand = :mode', [':mode' => $car])->all(), 'variant', 'variant');
              
             
             echo $form->field($signup, 'variant')->dropDownList(
                     $estado3, 
                     [
                         'prompt'=>'--- Select Variant ---',
                         	
                         	'onchange'=>'
                         	
                         	y=$("select#signupform-model_name").val();
                         	y1=$("select#signupform-brand").val();
                         	y2=$("select#signupform-fuel").val();
                         	
                         	
                         	 
                         	    $.get( "'.Url::toRoute('/site/findcarscolor').'", { var: $(this).val(),mod:'."y".' ,brand:'."y1".',fuel:'."y2".' } )
                         	        .done(function( data ) {
                         	            $("select#'.Html::getInputId($signup, 'color').'").html( data );
                         	        }
                         	    );
                         	'     
                       
                            
                     ]
             )->label('Variant*');
             
             ?>
             
 
                <!-- <?= $form->field($signup, 'variant')->dropDownlist(['prompt' => '---- Select Variant----']) ?>-->
               
                 
                <!-- <?= $form->field($signup, 'color')->dropDownlist($color,['prompt' => '---- Select Color ----','selector' => 'lable'])->label('Color*') ?>-->
                
                  <?= $form->field($signup, 'color')->dropDownList(
                  [
                  'prompt'=>'--- Select Color ---',
                  
                  
                  ])->label('Color*') ?>
                
                
               
                 
                  <?= $form->field($signup, 'city')->dropDownlist($city,['prompt' => '---- Select City ----'])->label('City*') ?>
                  
                   <?= $form->field($signup, 'tdrive')->inline()->radiolist($test)->label('Have You taken a Test-Drive of this Car?*') ?>
                  
                  
                  <?= $form->field($signup, 'other',['inputOptions' => [
                              'placeholder' => "Ex: I am looking for chrome door handles and seat covers as accessories.",
                          ],])->textarea(['rows' => '6'])->label('Message')?>
               
               
        <!-- </div>
           <div class="col-lg-4">-->
           
           </div>
           </div>
           
           
           <div class="row">
           
           <div class="col-lg-4">
                   <h3  style="margin-top: 30px;" >Basic Info</h3>
                   
            </div>
            
            <div class="col-lg-6 pull-right">
                    <p  style="margin-top: 35px;color: grey; font-family: lucida sans,sans-serif;" >Just so we can make the entire process simple & hassle-free.</p>
                    
             </div>
             
             </div>
            
             <div class="row">
             <div class="col-lg-12">
                    <hr style="margin-top: 0px;width: 88%;margin-left: 1px;">
             </div>
            </div>
            
            <div class="row" style="margin-bottom: 140px;">
           
               
                    <div class="col-lg-5">
           
           
              <?= $form->field($signup, 'email')->textInput(array('placeholder' => 'We will send all quotes to your Email Address'))->label('Email*') ?>
           
              <!--<?= $form->field($signup, 'password')->passwordInput()->label('Password*') ?>
               <?= $form->field($signup, 'password_repeat')->passwordInput()->label('Password Repeat*') ?>-->
         
         <?= $form->field($signup, 'fname')->textInput(array('placeholder' => 'Enter Your First Name'))->label('First Name*') ?>
          <?= $form->field($signup, 'lname')->textInput(array('placeholder' => 'Enter Your Last Name'))->label('Last Name*') ?>
           <!--<?= $form->field($signup, 'phone')->label('Phone*') ?>-->
           
           <?= $form->field($signup, 'phone', ['template' => '
             <div> {label}</div>
               <div class="col-sm-14">
                   <div class="input-group col-sm-15 ">
                      <span class="input-group-addon">
                         <span>+91</span>
                      </span>
                      {input}
                   </div>
                    {error}{hint}
               </div>'])->textInput(array('placeholder' => 'Enter 10 Digit Cell Phone Number'))->label('Cell Phone*') ?>

            <!--<?= $form->field($signup, 'check')	->checkbox(array('label'=>''))
            										->label(' I have read and accepted the Terms & Conditions'); ?>-->
            			<!--	<?= $form->field($signup, 'feedback',['inputOptions' => [
            				            'placeholder' => "Type Your Message Here",
            				        ],])->textarea(['rows' => '6'])->label('Feedback to Us (motormetric team)')?>-->
            										
            										<?= $form->field($signup, 'captcha')->widget(Captcha::className(), 
            										
            										[
            										'options' => [
            										           'class' => 'form-control',
            										           'placeholder' => 'Not case sensitive',
            										       ],
            										       
            										    'template' => '<div class="row"><div class="col-lg-3">{image}<a href="#" id="fox">Refresh</a></div><div class="col-lg-6" style="margin-left:50px;">{input}</div></div>',
            										    
            										   
            										]) ?>
            										
            				

         
       <div class="form-group">
               <?= Html::submitButton('GET BEST QUOTES!', 
               [
                
               
               'class' => 'btn btn-primary1', 
               'name' => 'login-button']) ?>
               
               
           </div>
           
           
          
           
           <!--
           <?= $form->field($signup, 'fname', ['template' => '
              <div class="col-sm-2">{label}</div>\n
              <div class="col-sm-10">
                  <div class="input-group col-sm-4 ">
                     <span class="input-group-addon">
                        <span class="glyphicon glyphicon-subtitles"></span>
                     </span>
                     {input}
                  </div>
                  {error}{hint}
              </div>'])->textInput(['data-default' => '']) ?>
          
            -->
      
           
           
        </div>
        
           <?php ActiveForm::end(); ?>
           
           
       <!-- <div class="col-lg-4" style="text-align: justify; width: 25%;">
        <p style="font-family: lucida sans,sans-serif; font-size: 13px;color: rgb(90, 89, 89);">
        
        Your contact information will only be shared with the dealer whose offer you accept.
        
        <br>
        
        <br>
        You will receive an email alert every time you receive a new quote from a dealer. You can then compare, negotiate online, and finalise the deal you like best.  
       <br>
       <br>
        
        Remember, you can buy your car from any manufacturer-authorised dealership and service your car at any manufacturer-authorised service centre in the country.
        
        
        
        </p>
        
        </div>  --> 
           
         
     </div>
     
       <div class="row" style="margin-top: 50px; margin-bottom: 100px;">
             <div class="col-lg-5">
         
           <div class="fb-like" data-href="https://www.facebook.com/MotorMetric" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
           
           </div>
     
         </div>
 
     

</div>
