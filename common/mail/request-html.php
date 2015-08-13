<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="password-reset">
    <p>Hello <?= Html::encode($user->username) ?>,</p>

    <p>Your Request for <?= Html::encode($req->car_model)?> has been sent to the dealers. You will get a reply soon</p>

</div>
