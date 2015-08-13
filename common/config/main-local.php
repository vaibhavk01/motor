<?php
return [
    'components' => [
    
    'cache' => [
                'class' => 'yii\caching\FileCache',
            ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=motormetric;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
            'username' => 'motor',
            'password' => 'motor',
            'charset' => 'utf8',
             'enableSchemaCache' => true,
            
                        // Duration of schema cache.
                        'schemaCacheDuration' => 3600,
            
                        // Name of the cache component used to store schema information
                        'schemaCache' => 'cache',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],
    ],
];
