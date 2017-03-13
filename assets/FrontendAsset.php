<?php
/**
 * Created by PhpStorm.
 * User: Andy
 * Date: 2016/4/1 0001
 * Time: 19:34
 */

namespace app\assets;

use yii\web\AssetBundle;

class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/pintuer.css',
        'css/style.css',
    ];
    public $js = [
        'scripts/pintuer.js',
        'scripts/respond.js',
    ];
    public $depends = [
    ];
}