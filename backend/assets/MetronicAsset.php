<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class MetronicAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'metronic/plugins/custom/fullcalendar/fullcalendar.bundle.css',
        'metronic/plugins/global/plugins.bundle.css',
        'metronic/plugins/custom/prismjs/prismjs.bundle.css',
        'metronic/css/style.bundle.css',
        'metronic/css/themes/layout/header/base/light.css',
        'metronic/css/themes/layout/header/menu/light.css',
        'metronic/css/themes/layout/brand/dark.css',
        'metronic/css/themes/layout/aside/dark.css',
        'metronic/css/pages/login/login-1.css',
        'css/site.css'
    ];
    public $js = [
      'metronic/plugins/global/plugins.bundle.js',
      'metronic/plugins/custom/prismjs/prismjs.bundle.js',
      'metronic/js/scripts.bundle.js',
      'metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js',
      'metronic/plugins/custom/gmaps/gmaps.js',
      'metronic/js/pages/widgets.js',
      'metronic/js/pages/custom/login/login-general.js',
      'js/html2canvas.min.js',
      'js/custom.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
