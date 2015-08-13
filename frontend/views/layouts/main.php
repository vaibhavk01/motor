<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <?= Html::csrfMetaTags() ?>
    <!--<title><?= Html::encode($this->title) ?></title>-->
    <title>Motormetric - smart,transparent new car buying</title>
    
     <link rel="shortcut icon" href="http://motormetric.com/images/fevicon.png" type="image/x-icon" />
    
    
    <?php $this->head() ?>
</head>
<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=1626723944276179";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <?php $this->beginBody() ?>
   <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Html::img('http://motormetric.com/images/logo.png'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
               // ['label' => 'Home', 'url' => ['/site/index']],

            ];
            if (Yii::$app->user->isGuest) {
               
               
              
            } else {
                /*$menuItems[] = [
                    'label' => 'Dashboard (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/dashboard'],
                    //'linkOptions' => ['data-method' => 'post']
                ];
                */

            }
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'encodeLabels' => false,
                'items' => [
                ['label' => 'How does it work','url'=>'https://medium.com/motormetric-blog/how-does-it-work-4dcc5f6d179b','linkOptions' => array('target'=>'_blank')],
                ['label' => 'Blog','url'=>'https://medium.com/motormetric-blog','linkOptions' => array('target'=>'_blank')],
                ['label' => 'Contact','url'=>['/site/contact']],
                ['label' => 'Login'],


                    /*Yii::$app->user->isGuest ?
                        ['label' => ' Login', 'url' => ['/site/login']] :
                        ['label' => '<span class="glyphicon glyphicon-user"></span>',
                           'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],*/
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();
        ?>

        <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
       </div>
   </div>

    <footer class="footer">
        <div class="container">
        <a href="https://medium.com/motormetric-blog/how-does-it-work-4dcc5f6d179b" target="_blank" style="color: white; margin-right: 15px;" class="pull-left" >How does it work</a>
        <a href="https://medium.com/motormetric-blog" target="_blank" style="color: white;margin-right: 15px;" class="pull-left" style="margin-left: 15px;">Blog</a>
        <a href="http://motormetric.com/chennai/site/contact" style="color: white;margin-right: 15px;" class="pull-left" style="margin-left: 15px;">Contact</a>
        <a href="#" style="color: white;margin-right: 15px;" class="pull-left" style="margin-left: 15px;">Login</a>
        
         <!--<p class="pull-left" style="margin-left: 15px;">Dealer Login</p>-->
        <p  class="pull-right">© 2015 Altec Prime Labs. All Rights Reserved.</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
       
        ga('create', 'UA-64723466-1', 'auto');
        ga('send', 'pageview');
       
       </script>
</body>
</html>


<?php $this->endPage() ?>
