<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/8/31
 * Time: 20:41
 */

namespace app\common\services;

use yii\helpers\Url;

class Urlservice {

    public static function domain(){
        return \yii::$app->params['domain'];
    }
    public static function buildWwwUrl($path,$params=[]){
         return self::domain()['www'].Url::toRoute(array_merge([$path],$params));
    }

    public static function buildWebUrl($path,$params=[]){
        return self::domain()['web'].Url::toRoute(array_merge([$path],$params));
    }

    public static function buildMUrl($path,$params=[]){
        return self::domain()['m'].Url::toRoute(array_merge([$path],$params));
    }

    public static function buildWechatUrl($path,$params=[]){
        return self::domain()['wechat'].Url::toRoute(array_merge([$path],$params));
    }
}