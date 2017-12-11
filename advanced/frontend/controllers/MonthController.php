<?php
namespace frontend\controllers;

use Yii;
// use yii\base\InvalidParamException;
// use yii\web\BadRequestHttpException;
use yii\web\Controller;

class MonthController extends Controller{
	//展示模板信息
	public function actionIndex(){
		return $this->render("index");
	}
}