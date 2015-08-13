<?php 

use yii\helpers\Html;
use yii\grid\GridView;
//use yii\bootstrap\ActiveForm;
use frontend\models\Car;
use yii\helpers\ArrayHelper;
use common\models\User;
use frontend\models\Chat;
use wbraganca\dynamicform\DynamicFormWidget;
use frontend\models\Userrequest;
use kartik\form\ActiveForm;
use kartik\select2\Select2;

use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;
use yii\data\ActiveDataProvider;

/*$use= new User();
$user = Yii::$app->user->identity->username;
$val = $use->findByUsername1($user);

$chat= new Chat();


          $rows=Userrequest::find()->where('id=:user_id', array (':user_id' => 1))->one();*/
          
  $test = [
  
      "Select" => "Select Option",
      "Yes" => "Yes",
      "No" => "No",  
  ]; 
  
  
  $int = [
      "Select" => "Select Interest Rate",
  		"0.00" => "0.00%",
      "0.25" => "0.25%",
      "0.5" => "0.5%",
      "0.75" => "0.75%",
      "1.0" => "1.0%",
      "1.25" => "1.25%",
      "1.5" => "1.5%", 
      "1.75" => "1.75%", 
      "2.0" => "2.0%",
      "2.25" => "2.25%",
      "2.5" => "2.5%", 
      "2.75" => "2.75%",
      "3.0" => "3.0%",
      "3.25" => "3.25%",
      "3.5" => "3.5%", 
      "3.75" => "3.75%",
      "4.0" => "4.0%",
      "4.25" => "4.25%",
      "4.5" => "4.5%", 
      "4.75" => "4.75%",
      "5.0" => "5.0%",
      "5.25" => "5.25%",
      "5.5" => "5.5%", 
      "5.75" => "5.75%",
      "6.0" => "6.0%",
      "6.25" => "6.25%",
      "6.5" => "6.5%", 
      "6.75" => "6.75%",
      "7.0" => "7.0%",
      "7.25" => "7.25%",
      "7.5" => "7.5%", 
      "7.75" => "7.75%",
      "8.0" => "8.0%",
      "8.25" => "8.25%",
      "8.5" => "8.5%", 
      "8.75" => "8.75%",
      "9.00" => "9.00%",
      "9.25" => "9.25%", 
      "9.50" => "9.50%",
      "9.75" => "9.75%",
      "10.00" => "10.00%",
      "10.25" => "10.25%", 
      "10.50" => "10.50%",
      "10.75" => "10.75%",
      "11.00" => "11.00%",
      "11.25" => "11.25%", 
      "11.50" => "11.50%",
      "11.75" => "11.75%",
      "12.00" => "12.00%",
      "12.25" => "12.25%", 
      "12.50" => "12.50%",
      "12.75" => "12.75%",
      "13.00" => "13.00%",
      "13.25" => "13.25%", 
      "13.50" => "13.50%",
      "13.75" => "13.75%",
      "14.00" => "14.00%",
      "14.25" => "14.25%", 
      "14.50" => "14.50%",
      "14.75" => "14.75%",
      "15.00" => "15.00%",
   
  ];
  
  
$delivery = [
    "Select" => "Select Delivery",
    "In 1 Week" => "In 1 Week",
    "In 2 Week" => "In 2 Week",
    "In 3 Week" => "In 3 Week",
    "In 4 Week" => "In 4 Week",
    "In 5 Week" => "In 5 Week",
    "In 6 Week" => "In 6 Week",
    "In 7 Week" => "In 7 Week",
    "In 8 Week" => "In 8 Week",
    "In 9 Week" => "In 9 Week",
    "In 10 Week" => "In 10 Week",
    "In 11 Week" => "In 11 Week",
    "In 12 Week" => "In 12 Week",
    "In 13 Week" => "In 13 Week",
    "In 14 Week" => "In 14 Week",
    "In 15 Week" => "In 15 Week",
    "In 16 Week" => "In 16 Week",
    "In 17 Week" => "In 17 Week",
    "In 18 Week" => "In 18 Week",
    "In 19 Week" => "In 19 Week",
    "In 20 Week" => "In 20 Week",
    "In 21 Week" => "In 21 Week",
    "In 22 Week" => "In 22 Week",
    "In 23 Week" => "In 23 Week",
    "In 24 Week" => "In 24 Week",
    
    
];


$payment =[

"DD" =>"DD",
"Cheque" =>"Cheque",
"Cash" =>"Cash",
"Credit/Debit Card" =>"Credit/Debit Card",



];
  
  $acc = [
      "Extended Warranty" => "Extended Warranty",
      "Road Side Assistance" => "Road Side Assistance",
      "Bumper to Bumper Insurance" =>"Bumper to Bumper Insurance",
      "Floor Mats (Rubber)" =>"Floor Mats (Rubber)",
      "Floor Mats (Fabric)" =>"Floor Mats (Fabric)",
      "Mud Guard" =>"Mud Guard",
      "Seat Covers" =>"Seat Covers",
      "Car Perfume" =>"Car Perfume",
      "Free Pick Up & Drop (Car Service)" =>"Free Pick Up & Drop (Car Service)",
      "Free Home Delivery" =>"Free Home Delivery", 
  ];        

?>


   
<script>
function myFunction() {
    var x = document.getElementById("fname").value;
    var number = parseInt(x);
    number=number+100;
    document.getElementById("demo").innerHTML=number;
}
</script>





<div class="site-index" style="margin-top: 150px; margin-left: 50px;margin-bottom: 100px;">

<div class="container">

<h3 style="font-family: lucida sans,sans-serif; margin-bottom: 30px;">Create Quote</h3>






<table style="width:100%; margin-bottom: 50px;">
<tr style="background-color:#D8D3D3;color: white;">
<th>Quote ID</th>
<th>User Name</th>
<th>Brand</th>
<th>Model</th>
<th>Fuel</th>
<th>Variant</th>
<th>Color</th>



</tr>

<tr>
<td><?php echo $quote;?></td>
<td><?php echo $var->firstname;?></td>
<td><?php echo $cars->model?></td>
<td><?php echo $cars->model_name?></td>
<td><?php echo $cars->fuel?></td>
<td><?php echo $cars->variant?></td>
<td><?php echo $var1->color?></td>



</tr>


</table>




	
	<hr>
	<p style="height: 100px;">User Message:<?php echo $var1->other?></p>
	<hr>
		
	
	
	
	
	
	




<div class="row" style="margin-top: 150;margin-left: 3px;">



	
	<div class="col-md-10">
	
<div class="customer-form" style="margin-top: 50px;">

    <?php $form = ActiveForm::begin(
    
    ['id' => 'dynamic-form',
    
    
    'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => ['labelSpan' => 5, 'deviceSize' => ActiveForm::SIZE_SMALL]]); ?>
    <div class="row" >
    <p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Dealership Details</p>
    <hr>
        <div class="row">
           <div class="col-sm-10">
        
            <?= $form->field($model, 'dname', [
                
                
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                    
                ],
                
                'inputOptions' => [
                
                'placeholder' => "Enter Dealership Name",
                ]
                
                ])->textinput(['class' => 'form-control'])->label("Dealership Name*") ?>
            </div>
            </div>
            <div class="row">
               <div class="col-sm-10">
           <?= $form->field($model, 'dperson',['feedbackIcon' => [
               
               'success' => 'ok',
               'error' => 'exclamation-sign',
               'defaultOptions' => ['class'=>'text-primary']
           ],
           
           'inputOptions' => [
           
           'placeholder' => "Enter Dealership Contact Person Name",
           ]
           
           
           
           ])->textinput(['class' => 'form-control'])->label("Dealership Contact Person*") ?>
               </div>
               </div>
               
               <div class="row">
                   <div class="col-sm-10">
                 <?php echo $form->field($model, 'dcontact', [
                      'addon' => ['prepend' => ['content'=>'+91']],
                      'feedbackIcon' => [
                          
                          'success' => 'ok',
                          'error' => 'exclamation-sign',
                          'defaultOptions' => ['class'=>'text-primary']
                      ],
                     
                     'inputOptions' => [
                     
                     'placeholder' => "Enter Cell Phone Number",
                     ]
                      
                      
                      
                  ])->textinput(['class' => 'form-control'])->label("Phone Number*");?>
            
                   </div>
                   </div>
            </div>
    <div class="row" >
    <!--<p style="background-color: #A4C860; width: 300px;padding: 8px;color: white; font-family: lucida sans,sans-serif; margin-top: 50px;margin-bottom: 50px;">Standard Charges</p>-->
    <p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Standard Charges</p>
    <hr>
        <div class="row">
           <div class="col-sm-10">
        
            <?= $form->field($model, 'price',['addon' => [ 
                    'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                ],
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                ],
                
                'inputOptions' => [
                
                'placeholder' => "Enter Dealership Name",
                ]
                
                ])->textinput(['class' => 'form-control'])->label("Ex-­Showroom
            Price*")->widget('yii\widgets\MaskedInput', [
               // 'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        
                         
                                       
                        'groupSeparator' => ',',
                        'autoGroup' => true,
                        
                    ],
            ]); ?>
            </div>
            </div>
            <div class="row">
               <div class="col-sm-10">
            <?= $form->field($model, 'roadt',['addon' => [ 
                    'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                ],
                
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                ],
                
               'inputOptions' => [
               
               'placeholder' => "Enter Dealership Name",
               ]
                
                
                ])->textinput(['class' => 'form-control'])->label("Road
            Tax*")->widget('yii\widgets\MaskedInput', [
               // 'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true
                    ],
            ]); ?>
               </div>
            <!--<div class="col-sm-1">
            <?= $form->field($model,'comp')->checkbox(['class' => '  comp']); ?>
            
            </div>-->
            </div>
            
            
            <div class="row">
               <div class="col-sm-10">
            <?= $form->field($model, 'regis',['addon' => [ 
                    'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                ],
                
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                ]
                
                
                ])->textinput(['class' => 'form-control'])->label("Registration Fee*")->widget('yii\widgets\MaskedInput', [
                   // 'name' => 'input-33',
                        'clientOptions' => [
                            'alias' =>  'decimal',
                            'groupSeparator' => ',',
                            'autoGroup' => true
                        ],
                ]); ?>
               </div>
            <!--<div class="col-sm-1">
            <?= $form->field($model,'comp')->checkbox(['class' => '  comp6']); ?>
            
            </div>-->
            </div>
            
            
            
            <div class="row">
               <div class="col-sm-10">
            <?= $form->field($model, 'roads',['addon' => [ 
                    'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                ],
                
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                ]
                
                
                ])->textinput(['class' => 'form-control'])->label("Road Safety Rax*")->widget('yii\widgets\MaskedInput', [
                   // 'name' => 'input-33',
                        'clientOptions' => [
                            'alias' =>  'decimal',
                            'groupSeparator' => ',',
                            'autoGroup' => true
                        ],
                ]); ?>
               </div>
            <!--<div class="col-sm-1">
            <?= $form->field($model,'comp')->checkbox(['class' => '  comp5']); ?>
            
            </div>-->
            </div>
            
            
            
            <div class="row">
               <div class="col-sm-10">
            <?= $form->field($model, 'handc',['addon' => [ 
                    'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                ],
                
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                ]
                
                
                ])->textinput(['class' => 'form-control'])->label("Handling
            Charges*")->widget('yii\widgets\MaskedInput', [
               // 'name' => 'input-33',
                    'clientOptions' => [
                        'alias' =>  'decimal',
                        'groupSeparator' => ',',
                        'autoGroup' => true
                    ],
            ]); ?>
               </div>
               
            <!--<div class="col-sm-1">
            <?= $form->field($model,'comp')->checkbox(['class' => 'comp1']); ?>
            
            </div>-->
            </div>
            
           </div>
            
            <div class="row">
          
            <p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Insurance</p>
            <hr>
            
            <div class="row">
               <div class="col-sm-10">
            <?= $form->field($model, 'compin',['addon' => [ 
                    'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                ],
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                ],
                
                'inputOptions' => [
                
                'placeholder' => "Enter Dealership Name",
                ]
                
                ])->textinput(['class' => 'form-control'])->label("Comprehensive	Insurance")->widget('yii\widgets\MaskedInput', [
                   // 'name' => 'input-33',
                        'clientOptions' => [
                            'alias' =>  'decimal',
                            'groupSeparator' => ',',
                            'autoGroup' => true
                        ],
                ]); ?>
               </div>
            <div class="col-sm-1">
            <?= $form->field($model,'comp')->checkbox(['class' => 'comp2']); ?>
            
            </div>
            
            </div>
            
            
            <div class="row">
            <div class="col-sm-10">
            <?= $form->field($model, 'insurance',['feedbackIcon' => [
                
                'success' => 'ok',
                'error' => 'exclamation-sign',
                'defaultOptions' => ['class'=>'text-primary']
                
                
                
            ],
            
            'inputOptions' => [
            
            'placeholder' => "Enter Names separated by commas",
            ]
            
            ])->textinput(['class' => 'form-control'])->label("Insurance	Company	Options") ?>
               </div>
               </div>
               
               
               
                           <div class="row">
               
               <div class="col-sm-10">
               <?= $form->field($model, 'casho')->widget(Select2::classname(), [
                   'data' => $test,
                   'hideSearch' => true,
                   
                
               ])->label('Cashless Settlement Option:');?>
               
               </div>
            
            </div>
            </div>
            
            

            
            
            <div class="row">
            
           
            
            <p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Discounts</p>
            <hr>
            
                        <div class="row">
            
               <div class="col-sm-10">
            <?= $form->field($model, 'cashd',['addon' => [ 
                    'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                ],
                
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                ]
                ])->textinput(['class' => 'form-control'])->label("Manufacturer	Discount")->widget('yii\widgets\MaskedInput', [
                   // 'name' => 'input-33',
                        'clientOptions' => [
                            'alias' =>  'decimal',
                            'groupSeparator' => ',',
                            'autoGroup' => true
                        ],
                ]); ?>
               </div>
            <div class="col-sm-1">
            <!--<?= $form->field($model,'comp')->checkbox(['class' => 'comp3'])->label("Complimentary");; ?>-->
            
            </div>
            </div>
            
            
            <div class="row">
               <div class="col-sm-10">
            <?= $form->field($model, 'cashs',['addon' => [ 
                    'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                ],
                
                'feedbackIcon' => [
                    
                    'success' => 'ok',
                    'error' => 'exclamation-sign',
                    'defaultOptions' => ['class'=>'text-primary']
                ]
                ])->textinput(['class' => 'form-control '])->label("Dealer	Discount")->widget('yii\widgets\MaskedInput', [
                   // 'name' => 'input-33',
                        'clientOptions' => [
                            'alias' =>  'decimal',
                            'groupSeparator' => ',',
                            'autoGroup' => true
                        ],
                ]); ?>
               </div>
            <div class="col-sm-1">
            <!--<?= $form->field($model,'comp')->checkbox(['class' => 'comp4'])->label("Complimentary");; ?>-->
            
            </div>
            </div>
            
            </div>
              
           
        
        
    

<!--- start dynamic --->

<div class="row">

<p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Accessories/ Add Ons/ Services</p>
<hr>

<div class="panel panel-default">
        <!--<div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> accesses</h4></div>-->
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $Maccess[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'access',

                ],
            ]); ?>
            
            <div class="panel-heading" style="color: black;">
           
               <!-- <h3 class="panel-title pull-left">ACCESSORIES/ ADD ONS/ SERVICES</h3>-->
                <br>
               
                <div class="pull-right">
                    <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                    
                    
                  
                </div>
                <div class="clearfix"></div>
            </div>



            <div class="container-items"><!-- widgetContainer -->
            
            
           
            <?php foreach ($Maccess as $i => $access): ?>
           
            
                <div class="panel panel-default"><!-- widgetBody -->
                
                <!--<div class="panel-heading" style="background-color: #A4C860;color: white;">
                    <h3 class="panel-title pull-left">ACCESSORIES/ ADD ONS/ SERVICES</h3>
                    <div class="pull-right">
                        <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                        <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>-->
                    
                    <div class=" item panel-body">
                       
                        <div class="row color">
                        <div class="col-sm-5">
                     
                        
                        <?=
                         $form->field($access, "[{$i}]access")->widget(Select2::classname(), [
                            'data' => $acc,
                            'options' => ['placeholder' => 'Select the accessories ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ])->label(false);
                        
                        ?>
                        

                         
                         
                     
                     
                        </div>
                            <div class="col-sm-4">
                                <?= $form->field($access, "[{$i}]price",['addon' => [ 
                                        'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
                                        
                                    ],
                                    
                                    'feedbackIcon' => [
                                        
                                        'success' => 'ok',
                                        'error' => 'exclamation-sign',
                                        'defaultOptions' => ['class'=>'text-primary']
                                    ]
                                    ])->textInput(['class' => 'form-control price'])->label(false); ?>
                            </div>
                            <div class="col-sm-1">
                            <?= $form->field($access, "[{$i}]comp")->checkbox(['class' => 'test']); ?>
                            
                            </div>
                        </div>
                        
                        <!-- .row -->
                        <!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            

            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>


<!--- end dynamic ---->


<!--- start dynamic ---->




<!--- end dynamic ---->


<div class="row" >

<p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Colour & Delivery Options</p>
<hr>

<div class="row color" >
<div class="col-sm-5">
<?= $form->field($model, 'c1',[
    'feedbackIcon' => [
        
        'success' => 'ok',
        'error' => 'exclamation-sign',
        'defaultOptions' => ['class'=>'text-primary']
    ],
    
    
    'inputOptions' => [
    
    'placeholder' => "Enter Colour Option 1",
    ]
    
    ])->textinput(['class' => 'form-control'])->label(false) ?>
   
</div>
<div class="col-sm-5">

<?= $form->field($model, 'd1')->widget(Select2::classname(), [
    'data' => $delivery,
    'hideSearch' => true,
    
 
])->label(false);?>




</div>
</div>

<div class="row color" >
<div class="col-sm-5">
<?= $form->field($model, 'c2',[
    'feedbackIcon' => [
        
        'success' => 'ok',
        'error' => 'exclamation-sign',
        'defaultOptions' => ['class'=>'text-primary']
    ],
    
    'inputOptions' => [
    
    'placeholder' => "Enter Colour Option 2",
    ]
    
    ])->textinput(['class' => 'form-control'])->label(false) ?>
   
</div>
<div class="col-sm-5">

<?= $form->field($model, 'd2')->widget(Select2::classname(), [
    'data' => $delivery,
    'hideSearch' => true,
    
 
])->label(false);?>




</div>
</div>


<div class="row color" >
<div class="col-sm-5">
<?= $form->field($model, 'c3',[
    'feedbackIcon' => [
        
        'success' => 'ok',
        'error' => 'exclamation-sign',
        'defaultOptions' => ['class'=>'text-primary']
    ],
    
    'inputOptions' => [
    
    'placeholder' => "Enter Colour Option 3",
    ]
    
    ])->textinput(['class' => 'form-control'])->label(false) ?>
   
</div>
<div class="col-sm-5">

<?= $form->field($model, 'd3')->widget(Select2::classname(), [
    'data' => $delivery,
    'hideSearch' => true,
    
 
])->label(false);?>




</div>
</div>


<div class="row color" >
<div class="col-sm-5">
<?= $form->field($model, 'c4',[
    'feedbackIcon' => [
        
        'success' => 'ok',
        'error' => 'exclamation-sign',
        'defaultOptions' => ['class'=>'text-primary']
    ],
    
    'inputOptions' => [
    
    'placeholder' => "Enter Colour Option 4",
    ]
    
    ])->textinput(['class' => 'form-control'])->label(false) ?>
   
</div>
<div class="col-sm-5">

<?= $form->field($model, 'd4')->widget(Select2::classname(), [
    'data' => $delivery,
    'hideSearch' => true,
    
 
])->label(false);?>




</div>
</div>




</div>






<div class="row" >
<p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Finance & Loans</p>
<hr>

            <div class="row">

<div class="col-sm-10">
<?= $form->field($model, 'interest')->textinput(['class' => 'form-control'])->label("Interest Rate:")->widget(Select2::classname(), [
        'data' => $int,
        'hideSearch' => true,
        
     
    ]) ?>
   </div>
</div>


            <div class="row">

<div class="col-sm-10">
<?= $form->field($model, 'bank',['feedbackIcon' => [
    
    'success' => 'ok',
    'error' => 'exclamation-sign',
    'defaultOptions' => ['class'=>'text-primary']
],

'inputOptions' => [

'placeholder' => "Enter Names separated by commas",
]


])->textinput(['class' => 'form-control'])->label("Bank Options:") ?>
   </div>
   </div>

</div>





<div class="row" >
<p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Payment Options</p>
<hr>

            <div class="row">

<div class="col-sm-10">
<?= $form->field($model, 'bamount',['addon' => [ 
        'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
    ],
    'feedbackIcon' => [
        
        'success' => 'ok',
        'error' => 'exclamation-sign',
        'defaultOptions' => ['class'=>'text-primary']
    ]
    
    ])->label("Booking Amount:")->widget('yii\widgets\MaskedInput', [
       // 'name' => 'input-33',
            'clientOptions' => [
                'alias' =>  'decimal',
                'groupSeparator' => ',',
                'autoGroup' => true
            ],
    ]); ?>
   </div>
   </div>


            <div class="row">

<div class="col-sm-10">

<?= $form->field($model, 'brefund')->widget(Select2::classname(), [
    'data' => $test,
    'hideSearch' => true,
    
 
])->label("Refundable Booking Amount:");?>


   </div>
   </div>
   
               <div class="row">
   
   <div class="col-sm-10">
   <?= $form->field($model, 'bcancel',['addon' => [ 
           'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
       ],
   
   
   'feedbackIcon' => [
       
       'success' => 'ok',
       'error' => 'exclamation-sign',
       'defaultOptions' => ['class'=>'text-primary']
   ]
   
   
   ])->textinput(['class' => 'form-control'])->label("Booking Cancellation Charges:")->widget('yii\widgets\MaskedInput', [
      // 'name' => 'input-33',
           'clientOptions' => [
               'alias' =>  'decimal',
               'groupSeparator' => ',',
               'autoGroup' => true
           ],
   ]); ?>
      </div>
      </div>

            <div class="row">


   <div class="col-sm-10">
   <?= $form->field($model, 'pmode')->checkboxList($payment, ['inline'=>true])->label("Payment Mode");?>
   
  
       
       
   
      </div>
      </div>
      
                  <div class="row">
      

   <div class="col-sm-10">
   
   <?= $form->field($model, 'terms',['inputOptions' => [
               'placeholder' => "Please mention your terms and condition here.",
           ],])->textarea(['rows' => '6'])->label('Terms and Conditions*')?>

      </div>

</div>





</div>





<div class="row" >
<p style="color: black; font-size: 20px;font-family: lucida sans,sans-serif; margin-top: 50px;">Total On-Road Price:</p>
<hr>

 <div class="col-sm-10 col-sm-offset-4" style="padding-left: 50px;">

   
<?= $form->field($model, 'final',['addon' => [ 
        'prepend' => ['content' => '₹', 'options'=>['class'=>'alert-success']],
    ],





'inputOptions' => [

'placeholder' => "Click View Price.",
'readOnly' => true,

],])->textinput(['class' => 'form-control mainprice'])->label(false); ?>
     
     </div>


</div>

<div class="col-sm-10 text-center" style="margin-top: 10px;" >

<div class="col-sm-5"></div>
<div class="col-sm-7">
<?= Html::Button('View Price', ['class' => 'btn btn-primary2','id' => 'create']) ?>


</div>
</div>

</div>
        
<div class="col-sm-10 text-center"  style="margin-top: 100px;">

<div class="col-sm-5"></div>
<div class="col-sm-7">
    <div class="form-group">
    
    
        <?= Html::submitButton('Submit Quote', ['class' => 'btn btn-primaryt5','id' => 'create']) ?>
    </div>
    </div>
    </div>
    
    

    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
</div>
</div>
</div>





