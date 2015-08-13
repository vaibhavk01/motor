

<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\Car;
use frontend\models\Carrequest;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\db\Query;
use yii\bootstrap\Modal;

use frontend\models\Dealerreply;
use frontend\models\Reply;

use frontend\models\Userrequest;


use yii\data\ActiveDataProvider;
use yii\helpers\Url;


$user = Yii::$app->user->identity->username;
$use= new User();
$val = $use->findByUsername1($user);

          $rows=Userrequest::find()->where('user_id=:user_id', array (':user_id' => $val->id))->all();


 ?>
 
<div class="site-index" style="margin-top: 5%; margin-bottom: 5%;">

    <?= Html::a('DASHBOARD', ['/controller/action'], ['class'=>'btn btn-primary4']) ?>
    <?= Html::button('ADD CAR', ['value'=>Url::to(['/site/addcar']),'class'=>'btn btn-primary4','id'=>'modalbutton']) ?>
    <?= Html::a('VIEW ARCHIVE ', ['/controller/action'], ['class'=>'btn btn-primary4']) ?>
    <?= Html::a('ASSIST ME ', ['/site/feedback'], ['class'=>'btn btn-primary4']) ?>
    <?= Html::a('SETTINGS', ['/controller/action'], ['class'=>'btn btn-primary4']) ?>

<?php
Modal::begin([
'header'=>'<h4>Add a new car</h4>',
'id'=>'modal',
'size'=>'modal-lg',
]);

echo "<div id='modalcontent'></div>";
Modal::end();
?>
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
<th>Quote	Specification</th>

</tr>




<?php 

if(count($rows)>0){
    foreach($rows as $row){
    
    
    echo "<tr>";
    
        
        $car=Car::find()->where('id=:id', array ('id' => $row->car_id))->one();
        $reqs=Carrequest::find()->where('request_id=:id', array ('id' => $row->id))->all();
        
        if(count($reqs)>0){
            foreach($reqs as $req){
           
            if($req->status==1)
            {
             $reply=Reply::find()->where('request_id=:id', array ('id' => $req->id))->one();
             echo "<td>".$row->id."</td>";
            echo "<td>".$req->dealer_id."</td>";
            echo "<td>".$car->model."</td>";
            echo "<td>".$car->model_name."</td>";
            echo "<td>".$car->fuel."</td>";
            echo "<td>".$car->variant."</td>";
            
            
            echo "<td>".$row->color."</td>";
            echo "<td>".$row->delivery."</td>";
            
            if(count($reply)>0)
            { 
            echo "<td><b>".$reply->price."</b></td>";
            
            $data = explode(",", $reply->feature);
            echo "<td>";
            for($i=0;$i<count($data);$i++)
            {
            echo "<span class=\"glyphicon glyphicon-ok\" aria-hidden=true style=\" margin-right:5px;color:green; border:solid\"></span> ".$data[$i]."<br>";
            }
            echo "</td>";
             echo "</tr>";
             
              echo "<tr style=\"border-bottom: 1px solid #333; width: 100%;\">";
                
                echo "<td class=\"test\">
                Status:	Awaiting	Dealer	Offers
                </td>
             
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>";
                echo "<td class=\"test\">". Html::a('VIEW DETAILS', ['/site/details','quote' => $req->id], ['class'=>'btn btn-primaryt1'])."</td>";
                 echo "<td class=\"test\">".Html::a('ACCEPT OFFER', ['/controller/action'], ['class'=>'btn btn-primaryt2'])."</td>";
                 echo "<td class=\"test\">".Html::a('ARCHIVE', ['/controller/action'], ['class'=>'btn btn-primaryt3'])."</td>";
                 echo "<td class=\"test\">".Html::a('MESSAGE', ['/site/details','quote' => $req->id], ['class'=>'btn btn-primaryt4'])."</td>";
               echo" </tr>";
            
            }
            
               
           
            }
            
            else {
           echo "<td>".$row->id."</td>";
            	echo "<td>"."pending"."</td>";
            	echo "<td>".$car->model."</td>";
            	echo "<td>".$car->model_name."</td>";
            	echo "<td>".$car->fuel."</td>";
            	echo "<td>".$car->variant."</td>";
            	
            	
            	echo "<td>".$row->color."</td>";
            	echo "<td>".$row->delivery."</td>";
            	echo "<td>"."pending"."</td>";
            	echo "<td>"."pending"."</td>";
            	echo "</tr>";
            	 echo "<tr style=\"border-bottom: 1px solid #333; width: 100%;\">";
            	   
            	   echo "<td class=\"test\">
            	   Status:	Awaiting	Dealer	Offers
            	   </td>
            	
            	   <td></td>
            	   <td></td>
            	   <td></td>
            	   <td></td>
            	   <td></td>";
            	   echo "<td class=\"test\">". Html::a('VIEW DETAILS', ['/site/details','quote' => $req->id], ['class'=>'btn btn-primaryt1'])."</td>";
            	    echo "<td class=\"test\">".Html::a('ACCEPT OFFER', ['/controller/action'], ['class'=>'btn btn-primaryt2'])."</td>";
            	    echo "<td class=\"test\">".Html::a('ARCHIVE', ['/controller/action'], ['class'=>'btn btn-primaryt3'])."</td>";
            	    echo "<td class=\"test\">".Html::a('MESSAGE', ['/site/details','quote' => $req->id], ['class'=>'btn btn-primaryt4'])."</td>";
            	  echo" </tr>";
            	
            	
            }
                
            }
            }
            
            
            
            
            
            
           
        
        //$dreply=Dealerreply::find()->where('request_id=:id', array ('id' => $row->id))->one();
        
        
        /*if(count($dreply)>0)
        {
         
         echo "<td>".$dreply->id."</td>";
        }else {
        	echo "<td>"."pending"."</td>";
        }
         
         
         
         
         
        echo "<td>".$car->model."</td>";
        echo "<td>".$car->model_name."</td>";
        echo "<td>".$car->fuel."</td>";
        echo "<td>".$car->variant."</td>";
        
        
        echo "<td>".$row->color."</td>";
        echo "<td>".$row->delivery."</td>";
        
       if(count($reply)>0)
       {
       echo "<td><b>".$reply->price."</b></td>";
       
       $data = explode(",", $reply->feature);
       echo "<td>";
       for($i=0;$i<count($data);$i++)
       {
       echo "<span class=\"glyphicon glyphicon-ok\" aria-hidden=true style=\" margin-right:5px;color:green; border:solid\"></span> ".$data[$i]."<br>";
       }
       echo "</td>";
       
       }
       else {
       	echo "<td>"."pending"."</td>";
       	echo "<td>"."pending<br> pending<br>pending</br>pending"."</td>";
       }
        */
        
        
   
    
    
    
    
 

  
  }
  }
  
  
   ?>
   
   
   
 </table>
 
 

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
 
 