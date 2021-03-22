<?php

namespace common\widgets\assets;

use \yii\web\AssetBundle;

class PopupNewsAsset extends AssetBundle
{
    public $sourcePath = '@common/widgets/source/popupNews';
    public $css = ['main.css'];
    public $js = ['main.js'];

    public $depends = [
        'yii\web\YiiAsset'
    ];
}