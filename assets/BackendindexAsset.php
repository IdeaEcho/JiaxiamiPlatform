<?php
namespace app\assets;

use yii\web\AssetBundle;

class BackendindexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'hplus/css/bootstrap.min.css',
        'hplus/css/font-awesome.min.css',
        'hplus/css/animate.min.css',
        'hplus/css/style.min.css',
        'hplus/css/plugins/toastr/toastr.min.css',
    ];
    public $js = [
        'hplus/js/bootstrap.min.js',
        'hplus/js/plugins/metisMenu/jquery.metisMenu.js',
        'hplus/js/plugins/slimscroll/jquery.slimscroll.min.js',
        'hplus/js/plugins/layer/layer.min.js',
        'hplus/js/hplus.min.js',
        'hplus/js/contabs.min.js',
        'hplus/js/plugins/pace/pace.min.js',
        'hplus/js/plugins/toastr/toastr.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
