<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

//$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/authuser', 'token' => $user->auth_key,'user' => $user->username]);

?>
<div class="password-reset">
    <p><b>User Email: </b><?= Html::encode($user->email) ?></p>
    <p><b>Brand: </b><?= Html::encode($user->brand) ?></p>
    <p><b>Model: </b><?= Html::encode($user->model_name) ?></p>
    <p><b>Fuel: </b><?= Html::encode($user->fuel) ?></p>
    <p><b>Variant: </b><?= Html::encode($user->variant) ?></p>
    <p><b>Color: </b><?= Html::encode($user->color) ?></p>
    <p><b>Message: </b><?= Html::encode($user->other) ?></p>
    <p><b>Delivery: </b><?= Html::encode($user->delivery) ?></p>
    <p><b>First Name: </b><?= Html::encode($user->fname) ?></p>
    <p><b>Last Name: </b><?= Html::encode($user->lname) ?></p>
    <p><b>Phone: </b><?= Html::encode($user->phone) ?></p>
    <p><b>Feedback: </b><?= Html::encode($user->feedback) ?></p>
    <p><b>Test Drive: </b><?= Html::encode($user->tdrive) ?></p>
    

    <p><b>IP:</b> <?php echo Yii::$app->getRequest()->getUserIP();?></p>


</div>
