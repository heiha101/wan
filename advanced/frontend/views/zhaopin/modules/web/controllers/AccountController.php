<?php

namespace app\modules\web\controllers;


use app\modules\web\controllers\common\BaseWebController;
use yii\web\Controller;

/**
 * Default controller for the `web` module
 */
class AccountController extends BaseWebController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionSet()
    {
        return $this->render('set');
    }
    public function actionPosition()
    {
        return $this->render('position');
    }
    public function actionResume()
    {
        return $this->render('resume');
    }

}
