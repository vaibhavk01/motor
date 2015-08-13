<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

 $price = explode(",", $req->price);
 $comps = explode(",", $req->access);
 $compa = explode(",", $req->service);
?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Your have gotten a reply from <?= Html::encode($req->dealer_name)?> for <?= Html::encode($req->car_model)?>. Below are the details</p>
    
    <p>Ex-Showroom Price:Rs <?= Html::encode($price[0])?></p>
    <p>Road Tax & Registration:Rs <?= Html::encode($price[1])?></p></p>
    <p>Handling Charges:Rs <?= Html::encode($price[2])?></p></p>
    <p>Comprehensive Insurance:Rs <?= Html::encode($price[3])?></p></p>
    <p>0% Depreciation Insurance:Rs <?= Html::encode($price[4])?></p></p>
    <p>Engine Cover:Rs <?= Html::encode($price[5])?></p></p>
    <p>Return To Invoice:Rs <?= Html::encode($price[6])?></p></p>
    <p>Cashless Service:Rs <?= Html::encode($price[7])?></p></p>
    <p>Cash Discounts:Rs <?= Html::encode($price[8])?></p></p>
    <p>Complimentary Accessories</p>
    	<?php
    	for($i=0;$i<count($comps);$i++)
    	{
    	 echo "<li> $comps[$i] </li>";
    	 if($comps=="Others")
    	 {
    	 echo "<li> $req->other </li>";
    	 }
    	
    	}
    	echo "<p>Complimentary Accessories</p>";
    	for($i=0;$i<count($compa);$i++)
    	{
    	 echo "<li> $compa[$i] </li>";
    	if($comps=="Fuel")
    	{
    	echo "<li> $req->fuel </li>";
    	}
    	
    	
    	}
    	
    	?>
    	<p>Message <?= Html::encode($req->feature)?></p>
    	<p>Salesman's Name <?= Html::encode($req->sname)?></p>
    	<p>Salesman's Contact <?= Html::encode($req->scontact)?></p>

</div>
