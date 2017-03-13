<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/4/10 0010
 * Time: 11:09
 */
namespace app\assets;
use yii\web\AssetBundle;

class BackendhomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'hplus/css/bootstrap.min.css',
        'hplus/css/font-awesome.min.css',
//        'hplus/css/plugins/toastr/toastr.min.css',
//        'hplus/css/animate.min.css',
        'hplus/css/style.min.css',
        'hplus/css/plugins/footable/footable.core.css'
    ];
    public $js = [
        'hplus/js/bootstrap.min.js',
        'hplus/js/common.js',
        'hplus/js/plugins/footable/footable.all.min.js',
        'hplus/js/jquery.form.js',
        'hplus/js/content.min.js',
//        'hplus/js/plugins/toastr/toastr.min.js'
//        'hplus/js/contabs.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}