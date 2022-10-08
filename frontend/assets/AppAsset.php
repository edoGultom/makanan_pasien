<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        // 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.css',

        'css/style.css',
        'css/components.css',
        // 'vendors/font-awesome/css/font-awesome.min.css'
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js',
        'js/stisla.js',
        'js/scripts.js',
        'js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}