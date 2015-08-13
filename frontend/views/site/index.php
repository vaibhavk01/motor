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
  <!--<select class="form-control target" id="sel1">
    <option value>Select City</option>
    <option value="Chennai">Chennai</option>
    <option value="Other">Other</option>
  </select>-->
  
  <input type="text" name="country" value="Serving Chennai" class="form-control" id="sel1" readonly><br>
</div>
  	
  	
  	</div>
  	</div>
  
 
  
  <div class="col-md-12 column" style="margin-top: 5px;">
   <div class="row clearfix" style="margin-bottom: 30px;">
   <h3 class="text-center" style="margin-bottom: 65px; font-family:Helvetica Neue; font-size: 55px;margin-bottom: 50px; font-weight: 100;" >
   	The Best New Car Deals, Right Here.
   </h3>
   
   
  
   </div>
   </div>
   
   <div class="row clearfix text-center" >
   <div class="row" id="manu">   
   
       <div class="col-md-12 column text-center" style="font-family: lucida sans,sans-serif; color: grey; margin-top: 30px; margin-bottom: 30px;" >
                   
       <div class="col-sm-6 nopadding" style="margin-top: 10px;"><img class="mainlog" src="http://motormetric.com/images/manu.png" style="opacity: .55;"></div>                      
               
     </div>       
   </div>
   	<div class="col-md-10 column col-md-offset-1" style="text-align: center;font-family: lucida sans,sans-serif;">
  
  <?php
  
  echo Typeahead::widget([
      'name' => 'country',
      'id' =>'carmain',
      'options' => ['placeholder' => 'Enter the car you want to buy'],
      'pluginOptions' => ['highlight'=>true],
      'dataset' => [
          [
              'datumTokenizer' => "Bloodhound.tokenizers.obj.whitespace('value')",
              'display' => 'value',
              'prefetch' =>'/samples/car_main1.json',
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
    	        <?= Html::submitButton('Get Best Quote!', 
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
    
    <p style="font-size: 17.5px;margin-top: 20px;">Enter the car you want to buy. Receive the best quote<br>
  available in your city. Buy your next new car!<br>
    It’s crazy simple.</p>
    <div style="margin-top: 60px;"></div>
    
       
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
    	<div class="col-md-4 column cardiv"  >
    		<img alt="140x140" src="http://motormetric.com/images/4.png" style="display: block;margin-left: auto;margin-right: auto;  width: 80px;" />
    		
    		<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
    			Clarity
    		</h3>
    		
    		<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 25px;">
    			Standard, Transparent, Hassle-<br>
    			Free Quotes
    		</h4>
    	</div>
    	<div class="col-md-4 column cardiv">
    	
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
    	<!--<div class="col-md-4 column cardiv" >
  
    	
    		<img alt="140x140" src="http://motormetric.com/images/7.png"  style="width: 105px;display: block;margin-left: auto;margin-right: auto;width: 60px; margin-top: 10px;"/>
    		
    		<h3 class="text-center" style="font-family: Lucida Sans, Sans-serif;">
    			Zero Calls
    		</h3>
    		
    		<h4 class="text-center" style="font-family: Lucida Sans, Sans-serif;font-size: 13px;margin-top: 20px;" >
Stay Anonymous till the Final Deal
    		</h4>
    	</div>-->
    	
    	<div class="col-md-4 column cardiv" >
    
    	
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
   
        <div class="container-fluid col-md-12 text-center " style="margin-top: 25px; margin-bottom: 100px;">
        
        <h1 style="margin-bottom: 50px;">Reviews from experts who drive cars day-in/day-out. </h1>
     
        <div class="row cars1">
   
   
   			<div class="col-md-2 column cardiv1">
   			<a href="http://www.team-bhp.com/forum/official-new-car-reviews/128675-maruti-alto-800-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Alto800_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   	
   					<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   				Alto 800</p>
   					</div>
   			<div class="col-md-2 column cardiv1"   >
   				<a href="http://www.team-bhp.com/forum/official-new-car-reviews/128675-maruti-alto-800-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/AltoK10_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   		<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			Alto K10</p>
   								
   			    	</div>
   			<div class="col-md-2 column cardiv1"  >
   			<a href="http://www.team-bhp.com/forum/official-new-car-reviews/158263-maruti-alto-k10-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Celerio_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			Celerio</p>
   								
   			    	</div>
   			 
   			 <div class="col-md-2 column cardiv1"   >
   			<a href="http://www.autocarindia.com/auto-reviews/maruti-suzuki-eeco-269284.aspx" target="_blank"> <img alt="140x140" src="http://motormetric.com/images/web/Eeco_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			 		
   			 <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			 Eeco</p>
   			 					
   			     	</div>
   			     	
   			  <div class="col-md-2 column cardiv1"  >
   			  <a href="http://www.team-bhp.com/forum/official-new-car-reviews/128675-maruti-alto-800-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Omni_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			  		
   			  <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			  Omni</p>
   			  					
   			      	</div>
   			      	
   			      	</div>
   	
   	
   
   
        <div class="row cars1">
   
   			<div class="col-md-2 column cardiv1">
   				<a href="http://www.team-bhp.com/forum/official-new-car-reviews/58316-maruti-ritz-test-drive-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Ritz_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   	
   					<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   					Ritz</p>
   					</div>
   			<div class="col-md-2 column cardiv1"   >
   				<a href="http://www.team-bhp.com/forum/indian-car-scene/140807-maruti-suzuki-stingray-picture-preview.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Stingray_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			Stingray</p>
   								
   			    	</div>
   			<div class="col-md-2 column cardiv1"  >
   				<a href="http://www.team-bhp.com/forum/official-new-car-reviews/80144-maruti-wagonr-test-drive-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/WagonR_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			WagonR</p>
   								
   			    	</div>
   			 
   			 <div class="col-md-2 column cardiv1"   >
   			 	<a href="http://www.autocarindia.com/auto-reviews/maruti-swift-facelift-first-look-review-391568,0.aspx" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Swift_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			 		
   			 <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			 Swift</p>
   			 					
   			     	</div>
   			     	
   			  <div class="col-md-2 column cardiv1"  >
   			 	<a href="http://www.autocarindia.com/auto-reviews/2015-maruti-swift-dzire-facelift-first-look-393516.aspx" target="_blank"> <img alt="140x140" src="http://motormetric.com/images/web/Dzire_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			  		
   			  <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			  Dzire</p>
   			  					
   			      	</div>
   	
   	
   </div>
   
    <div class="row cars1">
   
   			<div class="col-md-2 column cardiv1">
   			<a href="http://www.autocarindia.com/auto-reviews/2015-maruti-swift-dzire-facelift-first-look-393516.aspx" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Gypsy_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   	
   					<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   					Gypsy</p>
   					</div>
   			<div class="col-md-2 column cardiv1"   >
   			<a href="http://www.team-bhp.com/forum/official-new-car-reviews/156207-maruti-ciaz-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Ciaz_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			Ciaz</p>
   								
   			    	</div>
   			<div class="col-md-2 column cardiv1"  >
   			<a href="http://www.team-bhp.com/forum/official-new-car-reviews/119545-maruti-ertiga-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Ertiga_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Maruti Suzuki<br>
   			Ertiga</p>
   								
   			    	</div>
   			 
   			 <div class="col-md-2 column cardiv1"   >
   			 <a href="http://www.team-bhp.com/forum/official-new-car-reviews/110004-hyundai-eon-test-drive-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Eon_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			 		
   			 <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   			 Eon</p>
   			 					
   			     	</div>
   			     	
   			  <div class="col-md-2 column cardiv1"  >
   			 <a href="http://www.team-bhp.com/forum/official-new-car-reviews/97984-hyundai-i10-kappa2-test-drive-review.html" target="_blank"> <img alt="140x140" src="http://motormetric.com/images/web/i10_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			  		
   			  <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   			  i10</p>
   			  					
   			      	</div>
   	
   	
   </div>
   
   
   <div class="row cars1">
   
   			<div class="col-md-2 column cardiv1">
   			<a href="http://www.team-bhp.com/forum/official-new-car-reviews/141699-hyundai-grand-i10-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Grandi10Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   	
   					<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   					Grand i10</p>
   					</div>
   			<div class="col-md-2 column cardiv1"   >
   			<a href="http://indianautosblog.com/2014/04/hyundai-xcent-diesel-review-126179" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Xcent_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   			Xcent</p>
   								
   			    	</div>
   			<div class="col-md-2 column cardiv1"  >
   		<a href="http://indianautosblog.com/2014/08/hyundai-elite-i20-diesel-review-143762" target="_blank">	<img alt="140x140" src="http://motormetric.com/images/web/i20_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   			Elite i20</p>
   								
   			    	</div>
   			 
   			 <div class="col-md-2 column cardiv1"   >
   			<a href="http://indianautosblog.com/2015/03/hyundai-i20-active-review-172972" target="_blank"> <img alt="140x140" src="http://motormetric.com/images/web/i20Active_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			 		
   			 <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   			 i20 Active</p>
   			 					
   			     	</div>
   			     	
   			  <div class="col-md-2 column cardiv1"  >
   			 <a href="http://indianautosblog.com/2015/02/hyundai-verna-facelift-diesel-review-167814" target="_blank"> <img alt="140x140" src="http://motormetric.com/images/web/Vera_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			  		
   			  <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   			  4S Fluidic Verna</p>
   			  					
   			      	</div>
   	
   	
   </div>
   
   <div class="row cars1">
   
   			<div class="col-md-2 column cardiv1">
   			<a href="http://indianautosblog.com/2015/08/hyundai-creta-review-185535" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Creta_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   	
   					<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   					Creta</p>
   					</div>
   			<div class="col-md-2 column cardiv1"   >
   			<a href="http://www.team-bhp.com/forum/official-new-car-reviews/124248-hyundai-elantra-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Elantra_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   			Elantra</p>
   								
   			    	</div>
   			<div class="col-md-2 column cardiv1"  >
   			<a href="http://indianautosblog.com/2014/03/hyundai-santa-fe-4x4-at-review-121766" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/SantaFe_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Hyundai<br>
   			Santa Fe</p>
   								
   			    	</div>
   			 
   			 <div class="col-md-2 column cardiv1"   >
   			 <a href="http://www.team-bhp.com/forum/official-new-car-reviews/134857-mahindra-reva-e2o-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/e2o_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			 		
   			 <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   			 E2O</p>
   			 					
   			     	</div>
   			     	
   			  <div class="col-md-2 column cardiv1"  >
   			  <a href="http://www.team-bhp.com/forum/official-new-car-reviews/139122-mahindra-verito-vibe-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Vibe_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			  		
   			  <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   			  Verito Vibe</p>
   			  					
   			      	</div>
   	
   	
   </div>
   
   
   <div class="row cars1">
   
   			<div class="col-md-2 column cardiv1">
   			 <a href="http://www.topgear.com/india/mahindra/review-mahindra-verito/itemid-51" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Verito_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   	
   					<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   					Verito</p>
   					</div>
   			<div class="col-md-2 column cardiv1"   >
   			 <a href="http://www.team-bhp.com/forum/official-new-car-reviews/127483-mahindra-quanto-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Quanto_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   			Quanto</p>
   								
   			    	</div>
   			<div class="col-md-2 column cardiv1"  >
   			 <a href="http://www.autocarindia.com/auto-reviews/mahindra-bolero-zlx-review-test-drive-277456.aspx" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Bolero_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   			Bolero</p>
   								
   			    	</div>
   			 
   			 <div class="col-md-2 column cardiv1"   >
   			  <a href="http://www.team-bhp.com/forum/official-new-car-reviews/94711-mahindra-thar-test-drive-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Thar_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			 		
   			 <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   			 Thar</p>
   			 					
   			     	</div>
   			     	
   			  <div class="col-md-2 column cardiv1"  >
   			  <a href="http://www.autocarindia.com/auto-reviews/mahindra-xylo-update-review-test-drive-392468.aspx" target="_blank"> <img alt="140x140" src="http://motormetric.com/images/web/Xylo_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			  		
   			  <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   			  Xylo</p>
   			  					
   			      	</div>
   	
   	
   </div>
   
   <div class="row cars1">
   
   			<div class="col-md-2 column cardiv1">
   			 <a href="http://www.team-bhp.com/forum/official-new-car-reviews/157090-mahindra-scorpio-official-review.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Scorpio_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   	
   					<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   					Scorpio</p>
   					</div>
   			<div class="col-md-2 column cardiv1"   >
   			 <a href="http://www.autocarindia.com/auto-reviews/mahindra-getaway-4x4-old-269024.aspx" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Getaway_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   			Scorpio Getaway</p>
   								
   			    	</div>
   			<div class="col-md-2 column cardiv1"  >
   			 <a href="http://indianautosblog.com/2014/05/2014-mahindra-xuv500-review-129340" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/XUV_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Mahindra<br>
   			XUV500</p>
   								
   			    	</div>
   			 
   			 <div class="col-md-2 column cardiv1"   >
   			  <a href="http://www.business-standard.com/article/companies/mahindra-ssangyong-rexton-test-drive-and-review-112101800148_1.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Rexton_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			 		
   			 <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Ssangyong<br>
   			 Rexton</p>
   			 					
   			     	</div>
   			     	
   			  <div class="col-md-2 column cardiv1"  >
   			   <a href="http://indianautosblog.com/2012/03/honda-brio-review-design" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Brio_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			  		
   			  <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Honda<br>
   			  Brio</p>
   			  					
   			      	</div>
   	
   	
   </div>
   
   
   <div class="row cars1">
   
   			<div class="col-md-2 column cardiv1">
   			 <a href="http://indianautosblog.com/2015/06/2015-honda-jazz-diesel-first-drive-review-181262" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Jazz_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   	
   					<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Honda<br>
   					Jazz</p>
   					</div>
   			<div class="col-md-2 column cardiv1"   >
   			 <a href="http://indianautosblog.com/2013/04/first-drive-honda-amaze-1-5-liter-i-dtec-diesel-69986" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Amaze_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Honda<br>
   			Amaze</p>
   								
   			    	</div>
   			<div class="col-md-2 column cardiv1"  >
   			 <a href="http://indianautosblog.com/2014/07/honda-mobilio-diesel-review-136044" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/Mobilio_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   					
   			<p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Honda<br>
   			Mobilio</p>
   								
   			    	</div>
   			 
   			 <div class="col-md-2 column cardiv1"   >
   			  <a href="http://indianautosblog.com/2013/12/2014-honda-city-diesel-review-109270" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/City_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			 		
   			 <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Honda<br>
   			 City</p>
   			 					
   			     	</div>
   			     	
   			  <div class="col-md-2 column cardiv1"  >
   			   <a href="http://www.team-bhp.com/forum/official-new-car-reviews/133489-honda-cr-v-driven.html" target="_blank"><img alt="140x140" src="http://motormetric.com/images/web/CRV_Web.png" style="display: block;margin-left: auto;margin-right: auto;" /></a>
   			  		
   			  <p class="text-center cars" style="font-family: Lucida Sans, Sans-serif;">Honda<br>
   			  CR-V</p>
   			  					
   			      	</div>
   	
   	
   </div>
   
   
   
   </div>
   
 
    
    
    <div class="row clearfix text-center" style="margin-top: 30px;  margin-bottom: 140px;">
    	
    
   <div class="fb-like" data-href="https://www.facebook.com/MotorMetric" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
 
   </div>
   
   
   </div><!-- end site -->
   
   
  
  
