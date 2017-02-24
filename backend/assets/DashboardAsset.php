<?php
/**
 * Created by PhpStorm.
 * User: mandy
 * Date: 2/22/17
 * Time: 4:27 PM
 */

namespace backend\assets;
use yii\web\AssetBundle;


class DashboardAsset extends AssetBundle
{

    public $basePath = '@web';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/login.css',
        'css/admin/bootstrap.css',
        'css/admin/bootstrap.min.css',
        'css/admin/AdminLTE.min.css',
        'css/admin/_all-skins.min.css',
        'css/admin/blue.css',
        'css/admin/morris.css',
        'css/admin/jquery-jvectormap-1.2.2.css',
        'css/admin/datepicker3.css',
        'css/admin/daterangepicker.css',
        'css/admin/bootstrap3-wysihtml5.min.css',
    ];

    public $js =
        [
        'js/admin/bootstrap.min.js',
        'js/admin/jquery-ui.min.js',
        'js/admin/raphael-min.js',
        'js/admin/morris.min.js',
        'js/admin/jquery.sparkline.min.js',
        'js/admin/jquery-jvectormap-1.2.2.min.js',
        'js/admin/jquery-jvectormap-world-mill-en.js',
        'js/admin/moment.min.js',
        'js/admin/daterangepicker.js',
        'js/admin/bootstrap-datepicker.js',
        'js/admin/bootstrap3-wysihtml5.all.min.js',
        'js/admin/jquery.slimscroll.min.js',
        'js/admin/fastclick.js',
        'js/admin/app.min.js',
        'js/admin/dashboard.js',
        'js/admin/demo.js',
        ];

    public $depends =
        [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        ];
}
