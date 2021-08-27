<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache', //Включаем кеширование
      //      'defaultRoles' => ['registered'], // роль которая назначается всем пользователям по умолчанию
        ],
    ],
    'language' => 'ru-RU',
    'timeZone' => 'Asia/Kamchatka',
];
