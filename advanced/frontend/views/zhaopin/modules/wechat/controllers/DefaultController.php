<?php

namespace app\modules\wechat\controllers;

use yii\web\Controller;

/**
 * Default controller for the `wechat` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        echo 'wechat';die;
        return $this->render('index');
    }
}
