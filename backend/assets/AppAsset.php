<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@web';
    public $baseUrl = '@web';
    public $css =
        [
        'css/site.css',
        'css/login.css'
        ];
    public $js =
        [
        'js/bootstrapModal.js',
        'js/fullCalendar.js',
        'js/language.js',
        'js/login.js'
        ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
