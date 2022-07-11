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
    'language' => 'ua-UK',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
            'class' => 'frontend\components\LangRequest'
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
            'class' => 'frontend\components\LangUrlManager',
            'rules' => [
                '' => 'site/index',
//                'statistics/' => 'statistics/stat/index', //модуль статистики
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                'test' => 'service/test',
                'catalog' => 'category/index',
                'contact' => 'site/contact',
                'blog' => 'site/blog',
                'gde-kupit-pandus' => 'site/city',
                [
                    'pattern' => '<url:[\w-]+>',
                    'route' => 'product/view',
                    'suffix' => '.html',
                ],
                [
                    'pattern'=>'kupit-pandus-v-gorode/<city:[\w-]+>',
                    'route' => 'site/cities',
                    'suffix' => '.html',
                ],
                [
                    'pattern'=>'category/kraina-vyrobnyctva/<country:[\w-]+>',
                    'route' => 'category/country',
                    'suffix' => '.html',
                ],
                [
                    'pattern'=>'category/typy-pandusiv/<type:[\w-]+>',
                    'route' => 'category/types',
                    'suffix' => '.html',
                ],
                '<url:[\w-]+>' => 'category/category',
//                'kupit-pandus-v-gorode/<city:\d+>' => 'site/cities',
                [
                    'pattern' => 'post-pro-pandus/<url:[\w-]+>',
                    'route' => 'site/post',
                    'suffix' => '.html',
                ],
                '<controller:\w+>/<action:\w+>/' => '<controller>/<action>',
            ],
        ],
        'language'=>'ru-RU',
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@frontend/messages',
                    'sourceLanguage' => 'uk',
                    'fileMap' => [
                        'main' => 'main.php',
                    ],
                ],
            ],
        ],
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => ['/js/jquery-3.5.1.min.js'],
//                    'js' => ['https://code.jquery.com/jquery-3.6.0.min.js'],
                    'jsOptions' => ['position' => \yii\web\View::POS_BEGIN],
                ],
            ],
            'linkAssets' => true,
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\PathController',
            'access' => ['@'],
            'root' => [
                'path' => 'img/elfinderFiles',
                'name' => 'Files'
            ],
        ]
    ],
    'timeZone' => 'Europe/Kiev',
    'modules' => [
        'statistics' => [
            'class' => 'common\modules\statistics\StatModule',
        ],
    ],
    'aliases' => [
        '@moduleStat' => '@common/modules/statistics',
    ],
    'params' => $params,
];
