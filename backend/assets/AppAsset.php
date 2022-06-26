<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
//        'css/site.css',
        "dist/css/plugins.min.css",
        "dist/css/fullcalendar.min.css",
        "dist/css/main.min.css",
        'css/my-styles.css',
        'css/main.css',
    ];
    public $js = [
        "dist/js/plugins.min.js",
        "dist/js/moment.min.js",
        "dist/js/fullcalendar.min.js",
        "dist/js/fullcalendar.js",
        "dist/js/chartist.js",
        "dist/js/common.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
//    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
