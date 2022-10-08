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
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'class' => 'common\components\Request',
            'web' => '/frontend/web',
        ],
        'formatter' => [
            'dateFormat' => 'dd-MM-Y',
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '-',
        ],
        'user' => [
            // 'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],

            'identityClass' => 'mdm\admin\models\User',
            'loginUrl' => ['site/login'],
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
            'rules' => [],
        ],

        'assetManager' => [
            // 'bundles' => [
            //     'kartik\form\ActiveFormAsset' => [
            //         'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
            //     ],

            // ]
            'appendTimestamp' => true,
        ],


    ],
    'as access' => [
        'class' => 'common\components\AccessControl',
        'allowActions' => [
            'site/*',
            'gii/*',
            'debug/*',
        ]
    ],
    'params' => $params,
];