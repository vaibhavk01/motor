<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/authuser', 'token' => $user->auth_key,'user' => $user->username]);
?>
<div class="password-reset">

    
   <?php $pieces = explode("*", $email);?>

    <p><b>Name: </b><?php echo $pieces[0];?></p>
    <p><b>City: </b><?php echo $pieces[1];?></p>
 
 
    <p><b>IP:</b> <?php echo Yii::$app->getRequest()->getUserIP();?></p>
 
    

</div>
