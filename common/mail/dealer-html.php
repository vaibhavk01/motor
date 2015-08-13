<?php
use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */


$pieces = explode("#", $access);
?>

    
    
    <div class="container">
        <div class="row" style="margin-top: 100px; margin-bottom: 100px;">
        
        
        
        <div class="col-lg-12 centered" style="margin-top: 3%; text-align: justify; ">
         <h3 style="font-family: Myriad Set Pro,Lucida Grande,Helvetica Neue,Helvetica,Arial,Verdana,sans-serif; ">Thank You for sending us the quote.</h3>
         
      <p style="margin-top: 20px;margin-bottom: 50px;"> Your Quote to the user will look as below.</p>
      
      <div class="password-reset" style="border: 1px solid grey;padding: 20px; font-family: lucida sans,sans-serif;">
          
      <p><b>Quote ID: </b><?php echo $quote ?></p>
      <br>
      
      
      <table style="width:100%;margin-bottom: 100px;">
      <tr style="background-color:#D8D3D3;color: white;">
      <th>Dealership</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Fuel</th>
      <th>Variant</th>
      <th>Color</th>
      
      
      
      </tr>
      
      <tr>
      <td><?php echo $reply->dname;?></td>
      <td><?php echo $cars->model?></td>
      <td><?php echo $cars->model_name?></td>
      <td><?php echo $cars->fuel?></td>
      <td><?php echo $cars->variant?></td>
      <td><?php echo $var1->color?></td>
      
      
      
      </tr>
      
      
      </table>
      
      <hr>
   
      
      <h4 style="color: grey;"> Standard Charges</h4>
      <div class="row">
      
      <div class="col-md-5 column col-md-offset-5 pull-center">
      
      <p>Ex-Showroom Price:			Rs <?php echo $reply->price ?></p>
      <p>Road Tax:			 <?php echo (!empty($reply->roadt)) ? "Rs ".$reply->roadt : 'Complimentary' ?></p>
      <p>Registration:			 <?php echo (!empty($reply->regis)) ?"Rs ". $reply->regis : 'Complimentary' ?></p>
      <p>Road Safety Tax:			 <?php echo (!empty($reply->roads)) ?"Rs ". $reply->roads : 'Complimentary' ?></p>
      <p>Handling Charges:			 <?php echo (!empty($reply->handc)) ? "Rs ".$reply->handc : 'Complimentary' ?></p>
      
      </div>
      </div>
       <hr>
      
      <h4 style="color: grey;"> Insurance</h4>
      <div class="row">
      
      <div class="col-md-5 column col-md-offset-5 pull-center">
      <p>Comprehensive Insurance:<?php echo (!empty($reply->compin)) ? $reply->compin : 'None' ?></p>
      <p>Insurance Companies: <?php echo (!empty($reply->insurance)) ? $reply->insurance : 'None' ?></p>
      <p>Cashless Settlement Option:<?php echo (($reply->casho=="Select")) ? 'None' : $reply->casho  ?></p>
      
      
      </div>
      </div>
      
       <hr>
      
      <h4 style="color: grey;"> Discounts</h4>
      <div class="row">
      <div class="col-md-5 column col-md-offset-5 pull-center">
      <p>Manufacturer Discount:<?php echo (!empty($reply->cashd)) ? $reply->cashd : 'None' ?></p>
      <p>Dealer Discount: <?php echo (!empty($reply->cashs)) ? $reply->cashs : 'None' ?></p>
     </div>
     </div>
     
      <hr>
     
     <h4 style="color: grey;"> ACCESSORIES/ ADD ONS/ SERVICES</h4>
      <div class="row">
      <div class="col-md-5 column col-md-offset-5 pull-center">
      <?php
      
      for($i=0;$i<count($pieces)-1;$i++)
      {
      
      
      if(!empty($pieces[$i]))
      
      {
      $acc = explode(":", $pieces[$i]);
      
      if(!empty($acc[0])){
      echo "<p>".$acc[0].": ";
      echo (!empty($acc[1])) ? 'Rs '.$acc[1] : 'Complimentary';
      
      echo "</p>";
      }
      
      }
      
      }
      
      
      ?>
    
     </div>
     </div>
      <hr>
      
      
      <h4 style="color: grey;">Colour & Delivery</h4>
        <div class="row">
        <div class="col-md-5 column col-md-offset-5 pull-center">
   
        <?php 
        
        if(!empty($reply->c1))
        {
        echo (!empty($reply->c1)) ? '<p>'.$reply->c1.':' : '';
        
        echo (($reply->d1=="Select")) ? 'None' : $reply->d1;
        
         echo "</p>";  
         
         }    
      ?>
      
      
      <?php 
      
      if(!empty($reply->c2))
      {
      
        echo (!empty($reply->c2)) ? '<p>'.$reply->c2.':' : '';
        
        echo (($reply->d2=="Select")) ? 'None' : $reply->d2;
        
         echo "</p>"; 
         
         }     
      ?>
      
      <?php 
      
      if(!empty($reply->c3))
      {
      
        echo (!empty($reply->c3)) ? '<p>'.$reply->c3.':' : '';
        
        echo (($reply->d3=="Select")) ? 'None' : $reply->d3;
        
         echo "</p>"; 
         
         }     
      ?>
      
      <?php 
      
      if(!empty($reply->c4))
      {
      
        echo (!empty($reply->c4)) ? '<p>'.$reply->c4.':' : '';
        
        echo (($reply->d4=="Select")) ? 'None' : $reply->d4;
        
         echo "</p>"; 
         
         }     
      ?>
      
       </div>
       </div>
        <hr>
        
        
        <h4 style="color: grey;"> Finance & Loans</h4>
          <div class="row">
          <div class="col-md-5 column col-md-offset-5 pull-center">
          <p>Interest Rate:<?php echo (($reply->interest=="Select")) ? 'None' : $reply->interest."%" ?></p>
          <p>Bank Options:<?php echo (!empty($reply->bank)) ? $reply->bank : 'None' ?></p>
         
        
         </div>
         </div>
          <hr>
          
          
          <h4 style="color: grey;">Payment Options</h4>
            <div class="row">
            <div class="col-md-5 column col-md-offset-5 pull-center">
            <p>Booking Amount:<?php echo (!empty($reply->bamount)) ? $reply->bamount : 'None' ?></p>
            <p>Refundable Booking Amount:<?php echo (!empty($reply->refund)) ? $reply->refund : 'None' ?></p>
            <p>Booking Cancellation Charges:<?php echo (!empty($reply->bcancel)) ? $reply->bcancel : 'None' ?></p>
            <p>Payment Mode:<?php 
            
            
          $flag=0;
          if(!empty($reply->pmode))
          {
           foreach($reply->pmode as $mode)
           {
           $flag++;
           if($flag>1)
           {
           echo ",".$mode;
           }
           else {
           	echo $mode;
           }
           }
           }
            
            
            ?></p>
           
          
           </div>
           </div>
            <hr>
      
      
      
     
     <h4 style="color: grey;">Total on-Road Price</h4>
       <div class="row">
       <div class="col-md-5 column col-md-offset-5 pull-center">
       <p><b style="color: green; font-size: 30px;">Rs:<?php echo $reply->final ?></b></p>
       
     
      </div>
      </div>
     
      <hr>
      
      <h4 style="color: grey;">Dealership Details</h4>
        <div class="row">
        <div class="col-md-5 column col-md-offset-5 pull-center">
      <p><b>Dealership: </b><?php echo $reply->dname ?></p>
      <p><b>Dealer Contact Name: </b><?php echo $reply->dperson ?></p>
      <p><b>Phone: </b><?php echo $reply->dcontact ?></p>
        
      
       </div>
       </div>
     
      <hr>
      
      
   
      <div class="row" style="background-color: grey; text-align: center;color: white;">
       <h4 style="color: white;">Dealer Terms & Conditions</h4>
      <p><?php echo $reply->terms ?></p>
      
      </div>
     
      
      
      
      
      
         </div>
            
            
        </div>
        
         
</div>




