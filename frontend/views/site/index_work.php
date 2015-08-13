<style>
 
 
 .borderless tbody tr td, .borderless tbody tr th, .borderless thead tr th {
     border: none;
 }
 
 </style>
 
 <?php
 /* @var $this yii\web\View */
 $this->title = 'My Yii Application';
 use yii\bootstrap\ActiveForm;
 use yii\helpers\Html;
 use yii\captcha\Captcha;
 use frontend\models\Car;
 use yii\helpers\ArrayHelper;
 use yii\helpers\Url;
 

 use wbraganca\dynamicform\DynamicFormWidget;
 
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

 
 $blank = [
 ];
 
 ?>
 
 <div class="site-index" style="margin-top:100px">
  <div class="container" style="margin-top: 15px;">
  <div class="row clearfix text-right" >
  	<div class="col-md-2 column pull-right" >
  	
  	
  	
<div class="form-group">
  <select class="form-control target" id="sel1">
    <option value>Select City</option>
    <option value="Chennai">Chennai</option>
    <option value="Other">Other</option>
  </select>
</div>
  	
  	
  	</div>
  	</div>
  
 
  
  <div class="col-md-12 column" style="margin-top: 5px;">
   <div class="row clearfix" style="margin-bottom: 30px;">
   <h3 class="text-center" style="margin-bottom: 65px; font-family:Helvetica Neue; font-size: 55px;margin-bottom: 50px; font-weight: 100;" >
   	Quick, Transparent, New Car Quotes from Dealers in Your City.
   </h3>
   
   
  
   </div>
   </div>
   
   <div class="row clearfix text-center" >
   	<div class="col-md-10 column col-md-offset-1" style="text-align: center;font-family: lucida sans,sans-serif;">
  
  <?php
  
  echo Typeahead::widget([
      'name' => 'country',
      'id' =>'carmain',
      'options' => ['placeholder' => 'Enter the Car You Want to Buy'],
      'pluginOptions' => ['highlight'=>true],
      'dataset' => [
          [
              'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
              'display' => 'value',
              'prefetch' =>'/samples/cars.json',
              'limit'=>30,
             // 'remote' => [
               //   'url' => Url::to(['site/carlist']) . '?q=%QUERY',
                 // 'wildcard' => '%QUERY'
              //]
          ]
      ]
  ]);
   
   
   
   
   ?>
   </div>
   
   
    
    </div>
    
    <div class="row clearfix text-center" style="margin-top: 40px;">
    	<div class="col-md-10 column col-md-offset-1" >
    	
    	<div class="form-group">
    	        <?= Html::submitButton('GO!', 
    	        [
    	         
    	        
    	        'class' => 'btn btn-primarymain', 
    	        'name' => 'login-button']) ?>
    	        
    	        
    	    </div>
    
    
    </div>
    
    <div class="col-md-10 column col-md-offset-1" style="font-family: lucida sans,sans-serif; color: grey;" >
    
    <div class="row" id="rowimage" style="">   
    
        <div class="col-md-10 column col-md-offset-3" style="font-family: lucida sans,sans-serif; color: grey; margin-top: 50px;" >
                    
        <div class="col-sm-2 nopadding" style="margin-top: 10px;"><img class="" src="http://motormetric.com/images/1.png" style="width: 70px;opacity: .5;"></div>                      
        <div class="col-sm-2 nopadding" style="margin-top: 10px;"><img class="" src="http://motormetric.com/images/2.png" style="width: 40px;opacity: .5;"></div>  
        <div class="col-sm-2 nopadding" style="margin-top: 10px;"><img class="" src="http://motormetric.com/images/3.png" style="width:40px;opacity: .5;"></div>              
      </div>       
    </div>
    
    <p style="font-size: 17.5px;margin-top: 20px;">Choose the car You want to buy. We send You the<br>
   best quotes from dealers. Compare and select the<br>
    best deal You like. Simple, quick & hassle-free.</p>
    <div style="margin-top: 60px;"></div>
    
        <a style="font-size: 15px;margin-top: 30px;text-decoration: underline;" href="site/contact">Not sure what car to buy? Ask Us.</a>
    </div>
    
    
    </div>
    </div>
    
    
   </div>
   

  
 
   
   
   <div class="container-fluid col-md-12" style="margin-top: 25px; background-color: #A4C860; padding: 50px;color: white;">
 <!--<div class="row clearfix" >
 <div class="col-md-3 column" >
 		<img alt="140x140" src="http://motormetric.com/images/4.png" style="display: block;margin-left: auto;margin-right: auto; padding-top: 10px; width: 70px;" />
 		</div>
 		
 		<div class="col-md-3 column" >
 				<img alt="140x140" src="http://motormetric.com/images/5.png" style="display: block;margin-left: auto;margin-right: auto; padding-top: 10px; width: 100px;" />
 				</div>
 				
 				
 				<div class="col-md-3 column" >
 						<img alt="140x140" src="http://motormetric.com/images/7.png" style="display: block;margin-left: auto;margin-right: auto; padding-top: 10px; width: 50px;" />
 						</div>
 						
 						
 						<div class="col-md-3 column" >
 								<img alt="140x140" src="http://motormetric.com/images/8.png" style="display: block;margin-left: auto;margin-right: auto; padding-top: 10px; width: 50px;" />
 								</div>
 								
 			</div>-->
 			
 			<!--<div class="row clearfix" >
 			<div class="col-md-3 column" >
 			
 			<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
 				Clarity
 			</h3>
 			
 			</div>
 			
 			
 			<div class="col-md-3 column" >
 			
 			<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
 				From Your Desk
 			</h3>
 			
 			</div>
 			
 			
 			
 			<div class="col-md-3 column" >
 			
 			<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
 			Zero Calls
 			</h3>
 			
 			</div>
 			
 			
 			<div class="col-md-3 column" >
 			
 			<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
 				Value
 			</h3>
 			
 			</div>
 			
 			</div>
 			
 			
 			
 			<div class="row clearfix" >
 			<div class="col-md-3 column" >
 			
 			<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 20px;">
 				Standard, Transparent, Hassle-<br>
 				Free Quotes
 			</h4>
 			
 			</div>
 			
 			
 			<div class="col-md-3 column" >
 			
 		<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 20px;">
 		Save Time, Sweat & Fuel Visiting
 		Different Dealers
 		</h4>
 			
 			</div>
 			
 			
 			
 			<div class="col-md-3 column" >
 			
 			 		<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 22px;" >
 			Stay Anonymous till the Final Deal
 			    		</h4>
 			
 			</div>
 			
 			
 			<div class="col-md-3 column" >
 			
 				<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 20px;" >
 		Pay Only the Best Price for Your Next
 		New Car
 		    		</h4>
 			
 			</div>
 			
 			</div>-->
 
 
 
 
    
    <div class="row clearfix" >
    	<div class="col-md-3 column cardiv"  >
    		<img alt="140x140" src="http://motormetric.com/images/4.png" style="display: block;margin-left: auto;margin-right: auto;  width: 80px;" />
    		
    		<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
    			Clarity
    		</h3>
    		
    		<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 25px;">
    			Standard, Transparent, Hassle-<br>
    			Free Quotes
    		</h4>
    	</div>
    	<div class="col-md-3 column cardiv">
    	
    		<img alt="140x140" src="http://motormetric.com/images/5.png" style="width: 110px;display: block;margin-left: auto;margin-right: auto; margin-top: 10px;" />
    		<br>
    		<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
    		From Your Desk
    		</h3>
    		
    		<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 20px;">
    		Save Time, Sweat & Fuel Visiting
    		Different Dealers
    		</h4>
    	</div>
    	<div class="col-md-3 column cardiv" >
  
    	
    		<img alt="140x140" src="http://motormetric.com/images/7.png"  style="width: 105px;display: block;margin-left: auto;margin-right: auto;width: 60px; margin-top: 10px;"/>
    		
    		<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
    			Zero Calls
    		</h3>
    		
    		<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 20px;" >
Stay Anonymous till the Final Deal
    		</h4>
    	</div>
    	
    	<div class="col-md-3 column cardiv" >
    
    	
    		<img alt="140x140" src="http://motormetric.com/images/8.png"  style="width: 105px;display: block;margin-left: auto;margin-right: auto;width: 50px; margin-top: 10px;"/>
    		
    		<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
    			Value
    		</h3>
    		
    		<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 25px;" >
Pay Only the Best Price for Your Next
New Car
    		</h4>
    	</div>
    </div>
    
    
   </div>
   
     <div class="container"  style="">
   
    <div class="row clearfix text-center" style="margin-top: 140px;">
    	<div class="col-md-10 column col-md-offset-1" id="sign" >
    	
           <img class="" src="http://motormetric.com/images/9.png" style="width: 70px; margin-bottom: 30px;">
           
          <p style="font-size: 17px;font-family: lucida sans,sans-serif;">We are currently in beta and active in Chennai only.</p>
          
          <p style="font-size: 17px;font-family: lucida sans,sans-serif;">Launching soon in other cities as well.</p>

    
    </div>
    
   <div class="col-md-4 column col-md-offset-2" style="margin-top: 50px;" >
   
   <div class="form-group">
     <input type="email" class="form-control" id="email" placeholder="Enter Email ID" style="height: 40px;">
   </div>
       
    
    </div>
    
    <div class="col-md-4 column"  style="margin-top: 50px;" >
    
    <?php
    
    echo Typeahead::widget([
        'name' => 'country',
        'id'=>'city',
        'options' => ['placeholder' => 'Enter City'],
        'pluginOptions' => ['highlight'=>true],
        'dataset' => [
            [
                'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
                'display' => 'value',
                'prefetch' =>'/samples/cities3.json',
               // 'remote' => [
                 //   'url' => Url::to(['site/carlist']) . '?q=%QUERY',
                   // 'wildcard' => '%QUERY'
                //]
            ]
        ]
    ]);
     
     
     
     
     ?>
     
     
     </div>
    

    </div>
    
    <div class="row clearfix text-center" style="margin-top: 30px;  margin-bottom: 140px;">
    	<div class="col-md-10 column col-md-offset-1" >
    	
    	<div class="form-group" style="margin-bottom: 50px;">
    	        <?= Html::submitButton('Notify Me', 
    	        [
    	         
    	        
    	        'class' => 'btn btn-primarysign', 
    	        'name' => 'login-button']) ?>
    	        
    	        
    	    </div>
    
     
    
    </div>
    
   <div class="fb-like" data-href="https://www.facebook.com/MotorMetric" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
 
   </div>
   
   
   </div><!-- end site -->
   
   
  
  
