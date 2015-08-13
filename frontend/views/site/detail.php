<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">


$(document).ready(
    $('#login-form').on('beforeSubmit', function(event, jqXHR, settings) {
            var form = $(this);
            if(form.find('.has-error').length) {
                    return false;
            }

            $.ajax({
                    url: form.attr('action'),
                    type: 'post',
                    data: form.serialize(),
                    success: function(data) {
                            alert("test");
                    }
            });

            return false;
    }),
);

</script>

<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\Car;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\db\Query;
use yii\bootstrap\Modal;

use frontend\models\Dealerreply;
use frontend\models\Reply;
use frontend\models\Chat;

use frontend\models\Userrequest;


use yii\data\ActiveDataProvider;


$use= new User();
$user = Yii::$app->user->identity->username;
$val = $use->findByUsername1($user);

$chat= new Chat();


          $rows=Userrequest::find()->where('id=:user_id', array (':user_id' => $quote))->one();


 ?>
 
<div class="site-index" style="margin-top: 5%; margin-bottom: 5%;">

    <?= Html::a('DASHBOARD', ['/controller/action'], ['class'=>'btn btn-primary4']) ?>
    <?= Html::a('ADD CAR', ['/controller/action'], ['class'=>'btn btn-primary4']) ?>
    <?= Html::a('VIEW ARCHIVE ', ['/controller/action'], ['class'=>'btn btn-primary4']) ?>
    <?= Html::a('ASSIST ME ', ['/controller/action'], ['class'=>'btn btn-primary4']) ?>
    <?= Html::a('SETTINGS', ['/controller/action'], ['class'=>'btn btn-primary4']) ?>

</div>

<table>
<tr>
<th>Date and Time</th>
<th>Dealership</th>
<th>Brand</th>
<th>Model</th>
<th>Fuel</th>
<th>Variant</th>
<th>Color</th>
<th>Delivery</th>
<th>On-Road Price</th>


</tr>
</table>

<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
				
				<?php 
				
			$chats=Chat::find()->where('request_id=:id', array (':id' => $quote))->all();
			
		if(count($chats)>0){
		    foreach($chats as $chat){
		    if($chat->sent==1)
		    {
		    echo $chat->dealer_id.":".$chat->message."<br>";
		    
		    }
		    else {
		    	echo $chat->user_id.":".$chat->message."<br>";
		    	
		    }
		    
		    }
		    
		    }
		    
		    $chat->message="";
		    
				
				
				$form = ActiveForm::begin([
				        'id' => 'login-form',
				        
				        'enableAjaxValidation' =>false,
				        'enableClientValidation' => true,
				        
				]); ?>                      
				
				
				
				      <?= $form->field($chat, 'message') ?>                           
				      <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>                                              
				<?php ActiveForm::end(); ?>
				
				</div>
				<div class="col-md-10">
				</div>
			</div>
		</div>
	</div>







 





<!--
    <a href="javascript:void(0);" onclick="login();return false;">Login</a>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<script>
   function login(){

      $.ajax({
          type:'POST',
          url:'index.php?r=site/test',
          success: function(data)
                   {
                       $('#myModal').html(data);
                       $('#myModal').modal();
                   }
      });
   }
   

</script>

<?php 
Modal::begin([
    'header' => '<h2>Hello world</h2>',
    'toggleButton' => ['label' => 'click me'],
]);

echo 'Say hello...';

Modal::end();

 ?>-->
 
 