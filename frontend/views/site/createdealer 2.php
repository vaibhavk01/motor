<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use frontend\models\Car;
use yii\helpers\ArrayHelper;
$blank = [

"In 1 Week" => "In 1 Week",
];


?>


<div class="customer-form" style="margin-top: 5%;">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($modelDealership, 'dealership_name')->textInput(['maxlength' => true]) ?>
            <?php  
             
             $estado = ArrayHelper::map(Car::find()->all(), 'model', 'model');
            
             
                    echo $form->field($modelDealership, 'brand')->dropDownList(
                            $estado)->label('Brand*'); 

             
             ?>
            <?= $form->field($modelDealership, 'mcode')->textInput(['maxlength' => true])->label("Manufacturer Dealer Code (For Authentication with Manufacturer):*") ?>
            
                      
                    </div>
            
                </div>
                
                
            <div class="row">
                <div class="col-md-6">
            
            <div class="col-md-6">
            <?php  

           echo $form->field($modelDealership, 'year')->dropDownList(
                                        $blank)->label('Dealer Since:*');  ?>
                                        
                                         </div>
                                         
             <div class="col-md-6">
             <?php  
             
             
                        echo $form->field($modelDealership, 'year')->dropDownList(
                                                     $blank)->label('');  ?>                           
                                        
						 </div>
						 
						 
						 
						 
                         
           
            
             
        </div>

    </div>
    
      <div class="row">
                    <div class="col-md-6">
                
                <div class="col-md-6">
          
                                                <?= $form->field($modelDealership, 'ownfirstname')->textInput(['maxlength' => true]) ?>
                                            
                                             </div>
                                             
                 <div class="col-md-6">
               
                           <?= $form->field($modelDealership, 'ownlastname')->textInput(['maxlength' => true]) ?>
                                        
                                            
    						 </div>
    						 
    						 
    						 
    						 
                             
               
                
                 
            </div>
    
        </div>

    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Showroomes</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsShowroom[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'address',
                    
                ],
            ]); ?>

<div class="container-items"><!-- widgetContainer -->
<?php foreach ($modelsShowroom as $i => $modelShowroom): ?>
    <div class="item panel panel-default"><!-- widgetBody -->
        <div class="panel-heading">
            <h3 class="panel-title pull-left">Showroom</h3>
            <div class="pull-right">
                <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <?php
                // necessary for update action.
                if (! $modelShowroom->isNewRecord) {
                    echo Html::activeHiddenInput($modelShowroom, "[{$i}]id");
                }
            ?>
            <?= $form->field($modelShowroom, "[{$i}]address")->textarea(['rows' => '6'])?>
            <!-- .row -->
        </div>
    </div>
<?php endforeach; ?>
</div>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
        
    

    <div class="form-group">
        <?= Html::submitButton($modelShowroom->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
