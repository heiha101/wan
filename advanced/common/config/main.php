<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
//    'urlManager'=>array(
//        'urlFormat'=>'path',
//         'rules'=>array(
//            '<controller:\w+>/<id:\d+>'=>'<controller>/view',
//            '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
//            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//            '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
//        ),
//    ),
];
