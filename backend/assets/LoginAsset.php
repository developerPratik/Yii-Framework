<?php
/**
 * Created by PhpStorm.
 * User: mandy
 * Date: 2/22/17
 * Time: 4:18 PM
 */


namespace backend\assets;

use yii\web\AssetBundle;



class LoginAsset extends AssetBundle{


    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/login.css',

    ];

    public $js = [
        'js/bootstrap.min.js'

    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}