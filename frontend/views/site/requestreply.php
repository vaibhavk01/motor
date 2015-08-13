<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

use frontend\models\Car;
use frontend\models\Reply;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

use yii\db\Query;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

$query2 = (new Query())->select('car_model,color,variant,city')->from('userrequest')->where('id=:id', array(':id'=>$id));
$data2=$query2->one();

echo "<h3> Your Request - ".$data2['car_model'].":".$data2['color'].":".$data2['variant'].":".$data2['city']."</h3>";

foreach($data1 as $dat)
{



echo "<h3>Offers from ".$dat['dealer_name']."</h3><br>";


    
    



$query = (new Query())->select('car_model,price,feature,dealer_name,id')->from('reply')->where('username=:user AND dealer_name=:deal AND userreq_id=:id', array(':user'=>$user,'deal'=>$dat['dealer_name'],':id'=>$id));
$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);

?>


<?=GridView::widget([
				'summary'=>'',
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

                           
                            'car_model',
                            'dealer_name',
                            
                            [
                                           'label'=>'Ex-Showroom Price',
                                  
                                              'format'=>'raw',
                                  
                                              'value' => function($data){
                                              
                                              $price1=explode(",",$data['price']);
                                  
                                                 
                                                
                                  
                                                  return $price1[0];
                                  
                                              }
                                       
                            ],
                            
                            [
                                           'label'=>'View Detailed Reply',
                                  
                                              'format'=>'raw',
                                  
                                              'value' => function($data){
                                              
                                              $url=Yii::$app->urlManager->createAbsoluteUrl(['site/viewdetails', 'id' =>$data['id']]);
                                  
                                                 
                                                
                                  
                                                  return Html::a('View Details', $url, ['title' => 'Go']);
                                  
                                              }
                                       
                            ],
                            
                            
                            
          

            
        ],
    ]);
    
   ?>
<?php 
}
?>


