<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="password-reset">
    <p>Hello <?= Html::encode($deal->username) ?>,</p>

    <p>You have received a new request from <?= Html::encode($user->username) ?> for <?= Html::encode($req->car_model)?></p>

</div>
