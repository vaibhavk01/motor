<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */


$price = explode(",", $req['price']);
$comps = explode(",", $req['access']);
$compa = explode(",", $req['service']);
?>

    <div class="row">
    
     <h3>View Details</h3>

        
    </div>

<?php

echo DetailView::widget([
    'model' => $req,
    'attributes' => [
    
  
 'dealer_name',
 'car_model',       
 'price',
'access',
'other',
 'service',
 'fuel',
 'feature',
 'sname',
 'scontact',                 // title attribute (in plain text)
       
      // creation date formatted as datetime

    
     ],
]);

?>

