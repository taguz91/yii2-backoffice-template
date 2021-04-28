<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class NpmAsset extends AssetBundle
{
    public $sourcePath = '@npm';

    public $css = [
        'font-awesome/css/all.min.css',
    ];

    public $js = [
        'font-awesome/js/all.min.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
