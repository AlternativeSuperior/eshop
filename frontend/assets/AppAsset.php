<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/accordion.css',
        'css/main.css',
        'css/font-awesome.min.css',
        'css/animate.css',
        'css/prettyPhoto.css',
        'css/responsive.css',
        'css/bootstrap.min.css'
    ];
    public $js = [
        'js/accordion.js',
        'js/bootstrap.min.js',
        'js/main.js',
        'js/jquery.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.scrollUp.min.js',
        'js/contact.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    /*    'yii\bootstrap5\BootstrapAsset',*/
    ];
    
    public function registerAssetFiles($view) {

        parent::registerAssetFiles($view);

        $manager = $view->getAssetManager();
        $view->registerJsFile(
            $manager->getAssetUrl(
                $this,
                'js/html5shiv.min.js'
            ),
            [
                'condition' => 'lte IE9',
                'position'=>View::POS_HEAD
            ]
        );
    }
}
