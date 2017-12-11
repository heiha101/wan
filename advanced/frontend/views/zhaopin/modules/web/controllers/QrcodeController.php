<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 19:48
 */

namespace app\modules\web\controllers;

use app\modules\web\controllers\common\BaseWebController;
use yii\web\Controller;

/**
 * Default controller for the `web` module
 */
class QrcodeController extends BaseWebController
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
}