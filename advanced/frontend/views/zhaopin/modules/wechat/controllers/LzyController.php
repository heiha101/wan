<?php
/**
 * Created by PhpStorm.
 * User: cxcv4549
 * Date: 2017/9/12
 * Time: 14:28
 */

namespace app\modules\wechat\controllers;


use app\common\base\BaseController;

class LzyController extends BaseController{
        public function actionIndex(){
            $token=\yii::$app->params['wechat']['token'];
            $timestamp=trim($this->get('timestamp'));
            $nonce    =trim($this->get('nonce'));
            $signature    =trim($this->get('signature'));
            $echostr=$this->get('echostr');
            $sort_arr =[$token,$timestamp,$nonce];
            sort($sort_arr,SORT_STRING);
            $vrify_str=implode('',$sort_arr);
            $vrify_str=sha1($vrify_str);
            if($vrify_str!=$signature){
                return false;
            }
                return $echostr;
        }
}