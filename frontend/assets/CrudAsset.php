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
        'lib/assetstemplate/crudasset/ajaxcrud.css'
    ];
    public $js = [
        'lib/assetstemplate/crudasset/ModalRemote.js',
        'lib/assetstemplate/crudasset/ajaxcrud.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'kartik\grid\GridViewAsset',
    ];
}