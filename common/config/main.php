<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
          
        'cache' => [
                     'class' => 'yii\filters\HttpCache',
                 ],
      'urlManager' => [
          'enablePrettyUrl' => false,
          'showScriptName' => false,
          'enableStrictParsing' => false,
          'rules' => [
          
           '<controller:\w+>/<id:\d+>' => '<controller>/view',
             '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
             '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
              // ...
          ],
          
        
      ], 
      
      'onBeginRequest'=>create_function('$event', 'return ob_start("ob_gzhandler");'),
      'onEndRequest'=>create_function('$event', 'return ob_end_flush();'),
      
     
      'name'=>'Motormetric!' ,
      'title'=>'Motormetric'
        
    ],
];

