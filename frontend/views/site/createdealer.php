<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use frontend\models\Car;
use yii\helpers\ArrayHelper;
$year = [

"2000" => "2000",
"2001" => "2001",
"2002" => "2002",
"2003" => "2003",
"2004" => "2004",
"2005" => "2005",
"2006" => "2006",
"2007" => "2007",
"2008" => "2008",
"2009" => "2009",
"2010" => "2010",
"2011" => "2011",
"2012" => "2012",
"2013" => "2013",
"2014" => "2014",
"2015" => "2015",
];

$month = [

"January" => "January",
"Febuary" => "Febuary",
"March" => "March",
"April" => "April",
"May" => "May",
"June" => "June",
"July" => "July",
"August" => "August",
"September" => "September",
"October" => "October",
"November" => "November",
"December" => "December",

];
?>

<div class="customer-form" style="margin-top: 5%;">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    <div class="row">
           <div class="col-md-6">
               <?= $form->field($modelDealership, 'dealership_name')->textInput(['maxlength' => true])->label("Registered Dealership Name*") ?>
               <?php  
                
                $estado = ArrayHelper::map(Car::find()->all(), 'model', 'model');
               
                
                       echo $form->field($modelDealership, 'brand')->dropDownList(
                               $estado)->label('Vehicle Brand Sold*'); 
   
                
                ?>
               <?= $form->field($modelDealership, 'mcode')->textInput(['maxlength' => true])->label("Manufacturer Dealer Code (For Authentication with Manufacturer):*") ?>
               
                         
                       </div>
               
                   </div>
                   
                   
               <div class="row">
                   <div class="col-md-6">
               
               <div class="col-md-6">
                 
   
             <?= $form->field($modelDealership, 'month')->dropDownlist($month,['prompt' => '---- Select Month ----','selector' => 'lable'])->label('Dealer Since*') ?>
                                           
                                            </div>
                                            
                <div class="col-md-6">
         <?= $form->field($modelDealership, 'year')->dropDownlist($year,['prompt' => '---- Select Year ----','selector' => 'lable'])->label('') ?>                          
                                           
   						 </div>
   						 
   						 
   						 
   						 
                            
              
               
                
           </div>
   
       </div>
       
         <div class="row">
                       <div class="col-md-6">
                   
                   <div class="col-md-6">
             
                                                   <?= $form->field($modelDealership, 'ownfirstname')->textInput(['maxlength' => true])->label("Owner/CEO/MD/Proprietor Name:*") ?>
                                               
                                                </div>
                                                
                    <div class="col-md-6">
                  
                              <?= $form->field($modelDealership, 'ownlastname')->textInput(['maxlength' => true]) ?>
                                           
                                               
       						 </div>
       						 
       						 
       						 
       						 
                                
                  
                   
                    
               </div>
       
           </div>
   

    <div class="panel panel-default">
       <!-- <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Showroomes</h4></div>-->
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
                        <div class="row">
                            <div class="col-sm-6">
                             <?= $form->field($modelShowroom, "[{$i}]address")->textarea(['rows' => '9']) ?>
                             
                             <div class="row">
                             <h4>Telephone Line 1:*</h4>
                            <div class="col-sm-3">
                             <?= $form->field($modelShowroom, "[{$i}]t1code")->textInput(array('placeholder' => 'city code'))->label("") ?>
                             </div>
                             <div class="col-sm-9">
                                <?= $form->field($modelShowroom, "[{$i}]t1")->label("") ?>
                                </div>
                                </div>
                                
                                <!--<?= $form->field($modelShowroom, "[{$i}]c1") ?>-->
                             <?= $form->field($modelShowroom, "[{$i}]c1", ['template' => '
                               <div> {label}</div>
                                 <div class="col-sm-10">
                                     <div class="input-group col-sm-15 ">
                                        <span class="input-group-addon">
                                           <span>+91</span>
                                        </span>
                                        {input}
                                     </div>
                                      {error}{hint}
                                 </div>'])->textInput(['data-default' => '']) ?>
                                   
                                   
                                  

                            </div>
                            
                            
                             <div class="col-sm-6">
                               <?= $form->field($modelShowroom, "[{$i}]landmark") ?>
                                                        
                              <?= $form->field($modelShowroom, "[{$i}]city") ?>
                               <?= $form->field($modelShowroom, "[{$i}]pcode") ?>
                               
                               <div class="row">
                                <h4>Telephone Line 2:*</h4>
                               <div class="col-sm-3">
                                <?= $form->field($modelShowroom, "[{$i}]t2code")->textInput(array('placeholder' => 'city code'))->label("") ?>
                                </div>
                                <div class="col-sm-9">
                                   <?= $form->field($modelShowroom, "[{$i}]t2")->label("") ?>
                                   </div>
                                   </div>
                               
                               <!--<?= $form->field($modelShowroom, "[{$i}]c2") ?>-->
                               <?= $form->field($modelShowroom, "[{$i}]c2", ['template' => '
                                 <div> {label}</div>
                                   <div class="col-sm-10">
                                       <div class="input-group col-sm-15 ">
                                          <span class="input-group-addon">
                                             <span>+91</span>
                                          </span>
                                          {input}
                                       </div>
                                        {error}{hint}
                                   </div>'])->textInput(['data-default' => '']) ?>
                               
                               
                               
                            
                                                        </div>
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <?= $form->field($modelShowroom, "[{$i}]gfname") ?>
                            </div>
                            <div class="col-sm-3">
                                <?= $form->field($modelShowroom, "[{$i}]glname") ?>
                            </div>
                            
                            <div class="col-sm-6">
                            <?= $form->field($modelShowroom, "[{$i}]email") ?>
                            </div>

                        </div>
                        
                        
                        
                         <div class="row">
                                    <div class="col-sm-6">
                                    
                                       <!-- <?= $form->field($modelShowroom, "[{$i}]gcell") ?>-->
                                       
                                      <?= $form->field($modelShowroom, "[{$i}]gcell", ['template' => '
                                        <div> {label}</div>
                                          <div class="col-sm-10">
                                              <div class="input-group col-sm-15 ">
                                                 <span class="input-group-addon">
                                                    <span>+91</span>
                                                 </span>
                                                 {input}
                                              </div>
                                               {error}{hint}
                                          </div>'])->textInput(['data-default' => '']) ?>
        
                                    </div>
                                    
                                    <div class="col-sm-6">
                                    <div class="row">
                                     <h4>GM-Showroom Telephone:*</h4>
                                    <div class="col-sm-3">
                                     <?= $form->field($modelShowroom, "[{$i}]gt1code")->textInput(array('placeholder' => 'city code'))->label("") ?>
                                     </div>
                                     <div class="col-sm-9">
                                        <?= $form->field($modelShowroom, "[{$i}]gt1")->label("") ?>
                                        </div>
                                        </div>
                                    
                                                                </div>

                                    
                                    
                                </div>                
                        
                        
                        
                    </div>
                   <!-- <div class="panel-heading">
                        <h3 class="panel-title pull-left">Add a Showroom</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>-->
                
                
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    
    <!----- service center --->
    
    <div class="panel panel-default">
        <!--<div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Service</h4></div>-->
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform1_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelsService[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'address',
                    
                ],
            ]); ?>
                <div class="container-items"><!-- widgetContainer -->
                <?php foreach ($modelsService as $i => $modelService): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <h3 class="panel-title pull-left">Service Center</h3>
                            <div class="pull-right">
                                <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <?php
                                // necessary for update action.
                                if (! $modelService->isNewRecord) {
                                    echo Html::activeHiddenInput($modelService, "[{$i}]id");
                                }
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                 <?= $form->field($modelService, "[{$i}]address")->textarea(['rows' => '9']) ?>
                                 <div class="row">
                                  <h4>Telephone Line 1:*</h4>
                                 <div class="col-sm-3">
                                  <?= $form->field($modelService, "[{$i}]t1code")->textInput(array('placeholder' => 'city code'))->label("") ?>
                                  </div>
                                  <div class="col-sm-9">
                                     <?= $form->field($modelService, "[{$i}]t1")->label("") ?>
                                     </div>
                                     </div>
                                
                                    <!--<?= $form->field($modelService, "[{$i}]c1") ?>-->
                                 <?= $form->field($modelService, "[{$i}]c1", ['template' => '
                                   <div> {label}</div>
                                     <div class="col-sm-10">
                                         <div class="input-group col-sm-15 ">
                                            <span class="input-group-addon">
                                               <span>+91</span>
                                            </span>
                                            {input}
                                         </div>
                                          {error}{hint}
                                     </div>'])->textInput(['data-default' => '']) ?>
                                       
                                       
                                      
    
                                </div>
                                
                                
                                 <div class="col-sm-6">
                                   <?= $form->field($modelService, "[{$i}]landmark") ?>
                                                            
                                  <?= $form->field($modelService, "[{$i}]city") ?>
                                   <?= $form->field($modelService, "[{$i}]pcode") ?>
                                   <div class="row">
                                    <h4>Telephone Line 1:*</h4>
                                   <div class="col-sm-3">
                                    <?= $form->field($modelService, "[{$i}]t2code")->textInput(array('placeholder' => 'city code'))->label("") ?>
                                    </div>
                                    <div class="col-sm-9">
                                       <?= $form->field($modelService, "[{$i}]t2")->label("") ?>
                                       </div>
                                       </div>
                                   
                                   <!--<?= $form->field($modelService, "[{$i}]c2") ?>-->
                                   <?= $form->field($modelService, "[{$i}]c2", ['template' => '
                                     <div> {label}</div>
                                       <div class="col-sm-10">
                                           <div class="input-group col-sm-15 ">
                                              <span class="input-group-addon">
                                                 <span>+91</span>
                                              </span>
                                              {input}
                                           </div>
                                            {error}{hint}
                                       </div>'])->textInput(['data-default' => '']) ?>
                                   
                                   
                                   
                                
                                                            </div>
                                
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <?= $form->field($modelService, "[{$i}]gfname") ?>
                                </div>
                                <div class="col-sm-3">
                                    <?= $form->field($modelService, "[{$i}]glname") ?>
                                </div>
                                
                                <div class="col-sm-6">
                                <?= $form->field($modelService, "[{$i}]email") ?>
                                </div>
    
                            </div>
                            
                            
                            
                             <div class="row">
                                        <div class="col-sm-6">
                                        
                                           <!-- <?= $form->field($modelService, "[{$i}]gcell") ?>-->
                                           
                                          <?= $form->field($modelService, "[{$i}]gcell", ['template' => '
                                            <div> {label}</div>
                                              <div class="col-sm-10">
                                                  <div class="input-group col-sm-15 ">
                                                     <span class="input-group-addon">
                                                        <span>+91</span>
                                                     </span>
                                                     {input}
                                                  </div>
                                                   {error}{hint}
                                              </div>'])->textInput(['data-default' => '']) ?>
            
                                        </div>
                                        
                                        <div class="col-sm-6">
                                        
                                        <div class="row">
                                         <h4>Telephone Line 1:*</h4>
                                        <div class="col-sm-3">
                                         <?= $form->field($modelService, "[{$i}]gt1code")->textInput(array('placeholder' => 'city code'))->label("") ?>
                                         </div>
                                         <div class="col-sm-9">
                                            <?= $form->field($modelService, "[{$i}]gt1")->label("") ?>
                                            </div>
                                            </div>
                                        
                                                                    </div>
    
                                        
                                        
                                    </div>                
                            
                            
                            
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>
        </div>
        
        
  
        
        <!-- END SC -->
        <!-- start admin -->
        <div class="container-fluid" style="background-color: #A4C860; margin-top: 95px;padding: 10px;">
        
        <!--<div style="background-color: green;">-->
        <div class="row">
                                    <div class="col-sm-3">
                                        <?= $form->field($dealer, 'afname') ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <?= $form->field($dealer, 'alname')->label('') ?>
                                    </div>
                                    
                                    <div class="col-sm-6">
                                    <?= $form->field($dealer, 'desig') ?>
                                    </div>
        
                                </div>
       <div class="row">
          <div class="col-sm-6">
              <?= $form->field($dealer, 'c1') ?>
           </div>
          <div class="col-sm-6">
              <?= $form->field($dealer, 'c2')->label('') ?>
            </div>

        </div>
        
         <div class="row">
                  <div class="col-sm-6">
                      <?= $form->field($dealer, 't1') ?>
                   </div>
                  <div class="col-sm-6">
                      <?= $form->field($dealer, 't2')->label('') ?>
                    </div>
        
                </div>
                
                <div class="row">
                          <div class="col-sm-6">
                              <?= $form->field($dealer, 'email') ?>
                           </div>
                      
                
                        </div>
                
          <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($dealer, 'pass')->passwordInput() ?>
                     </div>
                    <div class="col-sm-6">
                        <?= $form->field($dealer, 'password_repeat')->passwordInput()->label('') ?>
                      </div>
          
                  </div>
                                
        
       </div> <!--End admin -->
    

    <div class="form-group">
        <?= Html::submitButton($modelShowroom->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>