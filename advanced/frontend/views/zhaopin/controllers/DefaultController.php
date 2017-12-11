<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/8/31
 * Time: 19:46
 */

namespace app\controllers;

use app\common\base\BaseController;
use app\common\services\Urlservice;
class DefaultController extends BaseController{
    public function actionIndex(){
//        echo Urlservice::buildWwwUrl('default/index');die;
       return $this->render('index');
    }
}