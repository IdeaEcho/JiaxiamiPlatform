<?php
namespace app\assets;

use yii\web\AssetBundle;

class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/animsition.min.css',
        'css/style.css',
    ];
    public $js = [
        'scripts/animated-headline.js',
        'scripts/menu.js',
        'scripts/modernizr.js',
        'scripts/isotope.pkgd.min.js',
        'scripts/jquery.animsition.min.js',
        'scripts/main.js',
        'scripts/smooth-scroll.js',
        'scripts/wow.min.js'
    ];
    public $depends = [
    ];
}
