<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/8/31
 * Time: 14:55
 */

namespace app\controllers;

use app\common\services\Urlservice;
use app\common\base\BaseController;

class LoginController extends BaseController{

      public function actionGet(){
          echo Urlservice::buildWwwUrl('login/post');die;

      }

    public function actionPost(){
        echo $this->get('id');
        //echo 7889;
    }
}