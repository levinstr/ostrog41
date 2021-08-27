<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'language' => 'ru-RU',
    'timeZone' => 'Asia/Kamchatka',
    'components' => [
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js'=>[]
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => ['css/bootstrap.min.css'],
                    'js' => ['js/bootstrap.min.js'],
                ],
            ],
        ],
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [

            ],
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'dd MMMM yyyy',
            'locale' => 'ru-RU',
            'thousandSeparator' => ' ',
            'decimalSeparator' => ',',
            'booleanFormat' => ['<i class="glyphicon glyphicon-remove" style="color:#9faab7;"></i>', '<i class="glyphicon glyphicon-ok" style="color: #428bca"></i>'],
//            'currencyCode' => 'RUB',
//            'numberFormatterSymbols'=>[\NumberFormatter::CURRENCY_SYMBOL => '₽'],
        ],
        'polls*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@yii/vendor/lslsoft/poll/messages',
        ],
    ],
    'params' => $params,
];
