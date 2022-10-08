<?php
return [
    'language' => 'id-ID',
    'timeZone' => 'Asia/Jakarta',
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
            'class' => 'yii\rbac\DbManager', // only support DbManager
        ],
    ],
    'modules' => [
        'gii' => [
            'class' => 'yii\gii\Module',
            'generators' => [
                'crud'   => [
                    'class' => 'common\generators_new\Generator',
                ]
            ]
        ],

        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ],
        'mimin' => [
            'class' => '\hscstudio\mimin\Module',
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
        ]
    ],
];