

<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\Car;
use yii\helpers\ArrayHelper;
use common\models\User;

if($comp)
{
echo $comp;
echo "vaibhav";

}
 ?>
 
<div class="site-index">

    <div class="jumbotron">
        <h3>Welcome <?php  echo $user; ?></h3>

        <p class="lead">Below is your Dashboard.</p>

        <p><a class="btn btn-lg btn-success" href="http://localhost:8888/advanced/frontend/web/index.php?r=site%2Flogout">Logout</a></p>
    </div>

    <div class="body-content">
    
    <div class="car-index">
    
    
      <h3>My Requests</h3>
      
        
        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
        
                                    'user_name',
                                    'car_model',
                                    'id',
                                    
                                 
                                 [
                                 'label'=>'Custom Link',
                        
                                    'format'=>'raw',
                        
                                    'value' => function($data){
                                    
                        
                                       $url = "http://localhost:8888/advanced/frontend/web/index.php?r=site%2Freply&id=".$data['id'];
                                      
                        
                                        return Html::a('Reply', $url, ['title' => 'Go']);
                        
                                    }
                             
                  ],
        
                    
                ],
            ]); ?>
    
    </div>
    
    
    
    
      <h3>My Replies</h3>
      
        
        <?= GridView::widget([
                'dataProvider' => $dataProvider1,
                
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
        
                                    'username',
                                    'car_model',
                                    'price',
                                    'feature',
                                    
                              
        
                    
                ],
            ]); ?>
    
    </div>
    

        
        </div>

    </div>
</div>
