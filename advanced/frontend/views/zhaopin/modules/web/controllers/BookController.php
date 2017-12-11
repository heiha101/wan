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
class BookController extends BaseWebController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionCat()
    {
        return $this->render('cat');
    }
    public function actionImages()
    {
        return $this->render('images');
    }
    public function actionSet()
    {
        return $this->render('set');
    }
    public function actionCat_set()
    {
        return $this->render('cat_set');
    }
}