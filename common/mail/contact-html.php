<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/authuser', 'token' => $user->auth_key,'user' => $user->username]);

?>
<div class="password-reset">
    <p><b>User Email: </b><?= Html::encode($user->email) ?></p>
    <p><b>Full Name: </b><?= Html::encode($user->name) ?></p>
    <p><b>Message: </b><?= Html::encode($user->body) ?></p>
    
    <p><b>IP:</b> <?php echo Yii::$app->getRequest()->getUserIP();?></p>
    
</div>
