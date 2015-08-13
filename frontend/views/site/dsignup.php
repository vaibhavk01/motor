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
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
             <?= $form->field($model, 'fname')->label('Firstname') ?>
              <?= $form->field($model, 'lname')->label('Lastname') ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'email') ?>
                   <?= $form->field($model, 'city')->dropDownlist($city,['prompt' => '---- Select City----','selector' => 'lable'],array('type'=>'hidden;')) ?>
                  
                <?= $form->field($model, 'password')->passwordInput() ?>
                
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
