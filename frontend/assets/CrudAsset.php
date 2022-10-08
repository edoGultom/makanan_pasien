<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author John Martin <john.itvn@gmail.com>
 * @since 1.0
 */
class CrudAsset extends AssetBundle
{
    public $css = [
        'crudasset/ajaxcrud.css'
    ];
    public $js = [
        'crudasset/ModalRemote.js',
        'crudasset/ajaxcrud.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
        'kartik\grid\GridViewAsset',
    ];
    public function init()
    {
        // In dev mode use non-minified javascripts
        $this->js = YII_DEBUG ? [
            'crudasset/ModalRemote.js',
            'crudasset/ajaxcrud.js',
        ] : [
            'cModalRemote.min.js',
            'crudasset/ajaxcrud.min.js',
        ];

        parent::init();
    }
}