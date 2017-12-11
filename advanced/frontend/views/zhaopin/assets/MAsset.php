<?php
/**
 * Created by PhpStorm.
 * User: cxcv4549
 * Date: 2017/9/15
 * Time: 14:26
 */

namespace app\assets;

use app\common\services\Urlservice;
use yii\web\AssetBundle;

class MAsset extends AssetBundle{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public function registerAssetFiles($view){
        $this->css = [

            Urlservice::buildWwwUrl('/style/css/popup.css'),
            Urlservice::buildWwwUrl('/style/css/ui.css'),
        ];
        $this->js=[
            Urlservice::buildWwwUrl('/style/js/jquery.1.10.1.min.js'),
            Urlservice::buildWwwUrl( '/style/js/jquery.lib.min.js'),
            Urlservice::buildWwwUrl( '/style/js/ajaxfileupload.js'),
            Urlservice::buildWwwUrl('/style/js/additional-methods.js'),
            Urlservice::buildWwwUrl('/style/js/conv.js'),
            Urlservice::buildWwwUrl('/style/js/search.min.js'),
            Urlservice::buildWwwUrl('/style/js/Chart.min.js'),
            Urlservice::buildWwwUrl('/style/js/home.min.js'),
            Urlservice::buildWwwUrl('/style/js/count.js'),
            Urlservice::buildWwwUrl( '/style/js/core.min.js'),
            Urlservice::buildWwwUrl( '/style/js/popup.min.js'),
        ];
        parent::registerAssetFiles($view);
    }
}