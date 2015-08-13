



<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use frontend\models\RequestForm;
use frontend\models\Car;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;

$city = [
    "delhi" => "Delhi",
    "Mumbai" => "Mumbai",
    "Kolkata" => "Kolkata",
    "Chennai" => "Chennai",
    
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

$color = [
    "black" => "black",
    "grey" => "grey",
    "white" => "white",
    "other" => "other",
    
];

$blank = [
];
$model=new RequestForm();
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
            <?php  
             
             $estado = ArrayHelper::map(Car::find()->all(), 'model', 'model');
            
             
                    echo $form->field($model, 'brand')->dropDownList(
                            $estado,
                            
                            
                            [
                            'test1=$(this).val();',
                                'prompt'=>'Select your Brand',
                                'test1=$(this).val();',
                                'onchange'=>'
                                    $.get( "'.Url::toRoute('/site/findcars').'", { model: $(this).val() } )
                                        .done(function( data ) {
                                            $("select#'.Html::getInputId($model, 'model_name').'").html( data );
                                        }
                                    );
                                    
                                    test1=$(this).val();
                                '    
                            ]
                    )->label('Brand*'); 
             
             
                 
             
             
             
             ?>
             
                 
                          <?php
                          
                           $estado1 = ArrayHelper::map(Car::find()->where('model = :model_name', [':model_name' => $model->brand])->all(), 'model_name', 'model_name');
                          
                           
                          echo $form->field($model, 'model_name')->dropDownList(
                                  $blank, 
                                  [
                                      //'prompt'=>'Select your Model',
                                      	'test=$(this).val();',
                                      'onchange'=>'
                                          $.get( "'.Url::toRoute('/site/findcarsfuel').'", { model: $(this).val() } )
                                              .done(function( data ) {
                                                  $("select#'.Html::getInputId($model, 'fuel').'").html( data );
                                              }
                                              
                                          );
                                          
                                          test=$(this).val();
                                      '    
                                  ]
                          )->label('Model*');
                          
                          
                          
                          
                          
                          ?>
                          
                          <?php
                          
                          $estado4 = ArrayHelper::map(Car::find()->where('model = :model_name', [':model_name' => $model->brand])->all(), 'fuel', 'fuel');
                          
                           $estado2= ArrayHelper::map(Car::find()->where('fuel = :fuel', [':fuel' => $model->fuel])->all(), 'fuel', 'fuel');
                           
                          
                          echo $form->field($model, 'fuel')->dropDownList(
                                  $blank, 
                                  [
                                      //'prompt'=>'Select your Model',
                                      	
                                      'onchange'=>'
                                      y=$("select#requestform-model_name").val();
                                      y1=$("select#requestform-brand").val();
                                      
                                      
                                       
                                          $.get( "'.Url::toRoute('/site/findcarsvar').'", { model: $(this).val(),mod:'."y".' ,mo:'."y1".' } )
                                              .done(function( data ) {
                                                  $("select#'.Html::getInputId($model, 'variant').'").html( data );
                                              }
                                          );
                                      '     
                                  ]
                          )->label('Fuel*');
                          
                          
                          
                          
                          
                          ?>
                          
                          
                          
              
                             <?= $form->field($model, 'variant')->dropDownlist(['prompt' => '---- Select Variant----']) ?>
                            
                              
                              <?= $form->field($model, 'color')->dropDownlist($color,['prompt' => '---- Select Color ----','selector' => 'lable'])->label('Color*') ?>
                              <?= $form->field($model, 'city')->dropDownlist($city,['prompt' => '---- Select City ----','selector' => 'lable'])->label('City*') ?>
                               <?= $form->field($model, 'delivery')->dropDownlist($delivery,['prompt' => '---- In Week(s) ----','selector' => 'lable'])->label('Delivery*') ?>
                               
                               <?= $form->field($model, 'other',['inputOptions' => [
                                           'placeholder' => "Ex: I am looking for chrome door handles and seat covers as accessories.",
                                       ],])->textarea(['rows' => '6'])->label('Message')?>
            
                
                <?= $form->field($model, 'captcha')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
                
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
      
        </div>
        
    </div>
</div>
