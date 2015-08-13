<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */


?>
<div class="site-contact" style="margin-top:100px">
<div class="container">

<h2 style="font-weight: 200;">Get in Touch!</h2>

<hr>


    <div class="row" style="margin-top: 50px; margin-bottom: 100px;">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name')->label('Full Name*') ?>
                <?= $form->field($model, 'email')->label('Email*') ?>
               
                <?= $form->field($model, 'body')->textArea(['rows' => 6]) ->label("Message*") ?>
            
                
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), 
                
                ['options' => [
                           'class' => 'form-control',
                           'placeholder' => 'Not case sensitive',
                       ],
                    'template' => '<div class="row"><div class="col-lg-3">{image}<a href="#" id="fox1">Refresh</a></div><div class="col-lg-6" style="margin-left:50px;">{input}</div></div>',
                ])->label('Verification Code*') ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary2', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        
        
    </div>
    
    <div class="row" style="margin-top: 50px; margin-bottom: 100px; margin-left: 2px;">
            
        
          <div class="fb-like" data-href="https://www.facebook.com/MotorMetric" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
          
         
    
        </div>
     

    </div>
    
    

</div>
