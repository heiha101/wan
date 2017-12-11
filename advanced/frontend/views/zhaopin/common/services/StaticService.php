<?php
 namespace app\common\services;

 class StaticService
 {

     public static function AppStatic($type,$path,$depends)
     {

         $version = defined('VERSION')?VERSION:time();
         $path = $path.'?ver='.$version;
         if($type == 'js')
         {
             \Yii::$app->getView()->registerJsFile($path,['depends'=>$depends]);
         }
         else
         {
             \Yii::$app->getView()->registerJsFile($path,['depends'=>$depends]);
         }
     }

     public static function includeJs($path,$depends)
     {
         self::AppStatic('js',$path,$depends);
     }

     public static function includeCss($path,$depends)
     {
         self::AppStatic('css',$path,$depends);
     }
 }
?>