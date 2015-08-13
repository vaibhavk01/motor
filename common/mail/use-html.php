<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/authuser', 'token' => $user->auth_key,'user' => $user->username]);
?>
<div class="password-reset">
    

    <p><b>Brand: </b><?php echo $user->brand ?></p>
    
    <p><b>Model: </b><?php echo $user->model_name ?></p>

    <p><b>IP:</b> <?php echo Yii::$app->getRequest()->getUserIP();?></p>
  
    

</div>
