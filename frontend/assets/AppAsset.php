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
        "/dist/lib/animate.css/animate.css",
        "/dist/lib/components-font-awesome/css/font-awesome.min.css",
        "/dist/lib/magnific-popup/dist/magnific-popup.css",
        "/dist/lib/et-line-font/et-line-font.css",
        "/dist/css/style.css",
//        'https://fonts.googleapis.com/css?family=Ubuntu',
//        'css/site.css',
    ];
    public $js = [
        "/dist/lib/wow/dist/wow.js",
//        "/dist/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js",
        "/dist/lib/imagesloaded/imagesloaded.pkgd.js",
//        "/dist/lib/flexslider/jquery.flexslider.js",
//        "/dist/lib/owl.carousel/dist/owl.carousel.min.js",
        "/dist/lib/magnific-popup/dist/jquery.magnific-popup.js",
        "/dist/js/plugins.js",
        "/dist/js/main.js",
        "/js/cart.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
//    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
