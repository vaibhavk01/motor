<script>
function doOtherThings(element){
    var checked = $(element).is(':checked');
    if (checked) {
    var e = document.getElementById("city");
    e.style.display = 'block';
  
    } else {
        // reset values
          var e = document.getElementById("city");
       e.style.display = 'none';
    }
}


</script>



<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;


use yii\grid\GridView;

use frontend\models\Car;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $signup \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

$city = [
    "delhi" => "Delhi",
    "Mumbai" => "Mumbai",
    "Kolkata" => "Kolkata",
    "Chennai" => "Chennai",
    
];
?>
<?php $item="test";
$color = [
    "black" => "black",
    "grey" => "grey",
    "white" => "white",
    "other" => "other",
    
];

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





?>

<div class="site-signup">
<h3  style="margin-top: 30px;" >Choose Your New Car</h3>
<hr style="margin-top: 0px;width: 83%;">


    <div class="row">
    
     <div class="col-lg-12">
       <div class="col-lg-4">
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); 
                    
                    $estado = ArrayHelper::map(Car::find()->all(), 'model', 'model');
                   
                    
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
                    
                     $estado1 = ArrayHelper::map(Car::find()->where('model = :model_name', [':model_name' => $signup->brand])->all(), 'model_name', 'model_name');
                    
                     
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
                    
                    $estado4 = ArrayHelper::map(Car::find()->where('model = :model_name', [':model_name' => $signup->brand])->all(), 'fuel', 'fuel');
                    
                     $estado2= ArrayHelper::map(Car::find()->where('fuel = :fuel', [':fuel' => $signup->fuel])->all(), 'fuel', 'fuel');
                     
                    
                    echo $form->field($signup, 'fuel')->dropDownList(
                            $estado4, 
                            [
                                //'prompt'=>'Select your Model',
                                	
                                'onchange'=>'
                                
                                
                                 y1 =test;
                                 y2 =test1;
                                 
                                    $.get( "'.Url::toRoute('/site/findcarsvar').'", { model: $(this).val(),mod:'."y1".' ,mo:'."y2".' } )
                                        .done(function( data ) {
                                            $("select#'.Html::getInputId($signup, 'variant').'").html( data );
                                        }
                                    );
                                '    
                            ]
                    )->label('Fuel*');
                    
                    
                    
                    
                    
                    ?>
                    
                    <?php
       
                     $estado3= ArrayHelper::map(Car::find()->where('model=:model AND model_name=:model_name AND fuel=:fuel', array (':model' => $signup->brand,':model_name'=>$signup->model_name,'fuel'=> $signup->fuel))->all(), 'variant', 'variant');
                    
                    echo $form->field($signup, 'variant')->dropDownList(
                            $estado3, 
                            [
                                'prompt'=>'--- Select Variant ---',
                                	
                              
                                   
                            ]
                    )->label('Variant*');
                    
                    ?>
                    
        
                       <!-- <?= $form->field($signup, 'variant')->dropDownlist(['prompt' => '---- Select Variant----']) ?>-->
                      
                        
                        <?= $form->field($signup, 'color')->dropDownlist($color,['prompt' => '---- Select Color ----','selector' => 'lable'])->label('Color*') ?>
                        <?= $form->field($signup, 'city')->dropDownlist($city,['prompt' => '---- Select City ----','selector' => 'lable'])->label('City*') ?>
                         <?= $form->field($signup, 'delivery')->dropDownlist($delivery,['prompt' => '---- In Week(s) ----','selector' => 'lable'])->label('Delivery*') ?>
                         
                         <?= $form->field($signup, 'otherr',['inputOptions' => [
                                     'placeholder' => "Ex: I am looking for chrome door handles and seat covers as accessories.",
                                 ],])->textarea(['rows' => '6'])->label('Message')?>
                      
                      
                </div>
                
             <div class="col-lg-4">
             
               <?= $form->field($signup, 'email')->label('Email*') ?>
                        
                           <?= $form->field($signup, 'password')->passwordInput()->label('Password*') ?>
                            <?= $form->field($signup, 'password_repeat')->passwordInput()->label('Password Repeat*') ?>
                      
                      <?= $form->field($signup, 'fname')->label('First Name*') ?>
                       <?= $form->field($signup, 'lname')->label('Last Name*') ?>
                        <?= $form->field($signup, 'lname')->label('Phone*') ?>
             
                         <?= $form->field($signup, 'check')	->checkbox(array('label'=>''))
                         										->label(' I have read and accepted the Terms & Conditions'); ?>
                      
                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                    </div>
                  
             </div> 
              
                        
             </div> 
             
              <?php ActiveForm::end(); ?> 
       
       
     <?php $form = ActiveForm::begin(['id' => 'form-signup']); 
      
     ?>
        <div class="col-lg-5">
        
        <?php
        $estado = ArrayHelper::map(Car::find()->all(), 'model', 'model');
        
         
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
        
         $estado1 = ArrayHelper::map(Car::find()->where('model = :model_name', [':model_name' => $signup->brand])->all(), 'model_name', 'model_name');
        
         
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
        
        $estado4 = ArrayHelper::map(Car::find()->where('model = :model_name', [':model_name' => $signup->brand])->all(), 'fuel', 'fuel');
        
         $estado2= ArrayHelper::map(Car::find()->where('fuel = :fuel', [':fuel' => $signup->fuel])->all(), 'fuel', 'fuel');
         
        
        echo $form->field($signup, 'fuel')->dropDownList(
                $estado4, 
                [
                    //'prompt'=>'Select your Model',
                    	
                    'onchange'=>'
                    
                    
                     y1 =test;
                     y2 =test1;
                     
                        $.get( "'.Url::toRoute('/site/findcarsvar').'", { model: $(this).val(),mod:'."y1".' ,mo:'."y2".' } )
                            .done(function( data ) {
                                $("select#'.Html::getInputId($signup, 'variant').'").html( data );
                            }
                        );
                    '    
                ]
        )->label('Fuel*');
        
        
        
        
        
        ?>
        
        <?php
        
                      $estado3= ArrayHelper::map(Car::find()->where('model=:model AND model_name=:model_name AND fuel=:fuel', array (':model' => $signup->brand,':model_name'=>$signup->model_name,'fuel'=> $signup->fuel))->all(), 'variant', 'variant');
                     
                     echo $form->field($signup, 'variant')->dropDownList(
                             $estado3, 
                             [
                                 'prompt'=>'--- Select Variant ---',
                                 	
                               
                                    
                             ]
                     )->label('Variant*');
                     
                     ?>
            
            <?= $form->field($signup, 'color')->dropDownlist($color,['prompt' => '---- Select Color ----','selector' => 'lable'])->label('Color*') ?>
            <?= $form->field($signup, 'city')->dropDownlist($city,['prompt' => '---- Select City ----','selector' => 'lable'])->label('City*') ?>
             <?= $form->field($signup, 'delivery')->dropDownlist($delivery,['prompt' => '---- In Week(s) ----','selector' => 'lable'])->label('Delivery*') ?>
             
             <?= $form->field($signup, 'otherr',['inputOptions' => [
                         'placeholder' => "Ex: I am looking for chrome door handles and seat covers as accessories.",
                     ],])->textarea(['rows' => '6'])->label('Message')?>
           

             
                
                <?= $form->field($signup, 'captcha')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                
         
                </div>
                 <div class="col-lg-5">
                 <?= $form->field($signup, 'username') ?>
                 <?= $form->field($signup, 'email') ?>
                 
                 
      
                 <div class="form-group">
                     <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                 </div>
                
            <?php ActiveForm::end(); ?>
            </div>
        </div>
      
        </div>
        
    </div>
</div>
