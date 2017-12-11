<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 15:26
 */
namespace app\common\services;
use app\assets\AppAsset;
class StaticServer {
    //设置静态资源方便插入css活js
    public static function staticAssets($type,$path)
    {
        $version=defined("VERSION") ? VERSION :date('Y-m-d',time());
        $path=$path."?ver=".$version;
        if($type=='css'){
            \Yii::$app->getView()->registerCssFile($path,['depends' =>AppAsset::className()]);
        }else {
            \Yii::$app->getView()->registerJsFile($path,['depends' =>AppAsset::className()]);
        }
    }
    //封装静态js方法
    public static function jsAssets($path)
    {
        self::staticAssets('js',$path);
    }
    //封装静态css方法
    public static function cssAssets($path)
    {
        self::staticAssets('css',$path);
    }
}