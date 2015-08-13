

<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\Car;
use yii\helpers\ArrayHelper;
use common\models\User;
use yii\db\Query;

use yii\data\ActiveDataProvider;

 ?>
 
<div class="site-index">

    <div class="jumbotron">
        <h3>Welcome <?php  echo $user; ?></h3>
        <?php
        if($auth==1)
        {
        echo "<h2 style=\"color:red;\"> You have not confirmed your email!</h2>";
        
        }
        ?>

        <p class="lead">Below is your Dashboard.</p>

        <p><a class="btn btn-lg btn-success" href="http://localhost:8888/advanced/frontend/web/index.php?r=site%2Flogout">Logout</a></p>
    </div>

    <div class="body-content">
    
    <div class="car-index">
    
    
      <h3>My Requests</h3>
      
        
        <?= GridView::widget([
                'dataProvider' => $dataProvider2,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
        
                                    
                                    'car_model',
                                    'color',
                                    'variant',
                                    'city',
                                    
                                    [
                                                   'label'=>'Replies from Dealers',
                                          
                                                      'format'=>'raw',
                                          
                                                      'value' => function($data){
                                                      
                                          
                                                         $url = "http://localhost:8888/advanced/frontend/web/index.php?r=site%2Freplydealer&id=".$data['id'];
                                                        
                                          
                                                          return Html::a('View Replies', $url, ['title' => 'Go']);
                                          
                                                      }
                                               
                                    ],
                  
        
                    
                ],
            ]); ?>
    
    </div>
    
    
      
        
        
    
    </div>
    

    
        <div class="row">
          
        </div>

        
        </div>

    </div>
</div>
