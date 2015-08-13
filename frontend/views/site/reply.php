<script>
function doOtherThings(element){

    var checked = $(element).is(':checked');
     var LinkObj = $(ListObject);
    if (checked) {
    alert("test");
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
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\Car;
use yii\helpers\ArrayHelper;
use common\models\User;

$compa = [
    "Floors Mats" => "Floors Mats",
    "Mud Flaps" => "Mud Flaps",
    "Seat Covers" => "Seat Covers",
    "Car Body Cover" => "Car Body Cover",
     "Others" => "Others",
    
];

$comps = [
    "Bouquet of Flower on Car Delivery" => "Bouquet of Flower on Car Delivery",
    "Door Step Pick Up of Booking Amount" => "Door Step Pick Up of Booking Amount",
    "Post Delivery Feature Explanation" => "Post Delivery Feature Explanation",
    "Chocolates Box on Car Delivery" => "Chocolates Box on Car Delivery",
     "Fuel" => "Free Fuel (Litres ______)",
    
];



 ?>
 

<div class="site-index">

  
    
    <p>Give new quote:</p>
    
        <div class="row">
       
            <div class="col-lg-5">
            
        
         
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?= $form->field($model, 'price')->label('Ex-Showroom Price')  ?>
                    <?= $form->field($model, 'roadt')->label('Road Tax & Registration') ?>
                    <?= $form->field($model, 'handc')->label('Handling Charges')?>
                    <?= $form->field($model, 'compin')->label('Comprehensive Insurance') ?>
                    <?= $form->field($model, 'depin')->label('0% Depreciation Insurance') ?>
                    <?= $form->field($model, 'engc')->label('Engine Cover') ?>
                     <?= $form->field($model, 'rtoinv')->label('Return To Invoice') ?>
                      <?= $form->field($model, 'cashs')->label('Cashless Service') ?>
                      <?= $form->field($model, 'cashd')->label('Cash Discounts') ?>
                    
                    
                    </div>
                   <div class="col-lg-5"> 
                                    <?= $form->field($model, 'compa')->checkBoxList($compa)->label('Complimentary Accessories') ?>
                                 
                                     <?= $form->field($model, 'other')->label('If Others, Please specify') ?>
                                    
                 
                                    <?= $form->field($model, 'comps')->checkBoxList($comps)->label('Complimentary Services') ?>
                                     <?= $form->field($model, 'other')->label('Fuel in Litres') ?>
                   <?= $form->field($model, 'feature')->textarea()->label('Any other details?')?>
                   
                   <?= $form->field($model, 'sname')->label('Salesman\'s Name') ?>
                   <?= $form->field($model, 'scontact')->label('Salesman\'s Contact') ?>
                  <div class="form-group">
                      <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                  </div>
                  
                   
                <?php ActiveForm::end(); ?>
            </div>
        </div>

        
        </div>

    </div>
</div>
