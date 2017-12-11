<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/9/1
 * Time: 20:06
 */

namespace app\assets;

use app\common\services\Urlservice;
use yii\web\AssetBundle;

class WebAsset extends AssetBundle{
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
            Urlservice::buildWwwUrl('/css/web/bootstrap.min.css'),
            Urlservice::buildWwwUrl('/font-awesome/css/font-awesome.css'),
            Urlservice::buildWwwUrl('/css/web/style.css',['ver'=>'20170401']),
        ];
        $this->js=[
            'plugins/jquery-2.1.1.js',
            'js/web/common.js',
            'js/web/bootstrap.js',
        ];
        parent::registerAssetFiles($view);
    }
}