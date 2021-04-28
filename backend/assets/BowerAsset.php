<?php

namespace backend\assets;

use yii\web\AssetBundle;

class BowerAsset extends AssetBundle
{
    public $sourcePath = '@bower';

    public $css = [];

    public $js = [];

    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
