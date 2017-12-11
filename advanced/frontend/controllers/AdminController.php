<?php

namespace frontend\controllers;
header("content-type:text/html;charset=utf-8");
use yii\web\controller;
use frontend\models\Bill;
use frontend\models\Decide;
use frontend\models\Many;
class AdminController extends controller
{
        public $layout = false;
    public $enableCsrfValidation = false;
    public function actionIndex(){
        return $this->render('index');
    }
    public function actionBill(){
        if(\Yii::$app->request->isGet){
            return $this->render('bill');
        }

//        Array ( [title] => 1 [answer1] => 1 [check] => Array ( [0] => a ) [answer2] => 2 [answer3] => 3 [answer4] => 4 )
        $model = new Bill();
        $model->title = $title = \Yii::$app->request->post('title');
        $checked = \Yii::$app->request->post('check');
        $model->answer1 = $answer1 = \Yii::$app->request->post('answer1');
        $model->answer2 = $answer2 = \Yii::$app->request->post('answer2');
        $model->answer3 = $answer3 = \Yii::$app->request->post('answer3');
        $model->answer4 = $answer4 = \Yii::$app->request->post('answer4');
        $model->check = $check = $checked[0];
        if($model->save()){
           return $this->render('index');
        }

    }
    public function actionMany(){
        if(\Yii::$app->request->isGet){
            return $this->render('many');
        }

        $model = new Many();
        $model->title = $title = \Yii::$app->request->post('title');
        $model->answer1 = $answer1 = \Yii::$app->request->post('answer1');
        $model->answer2 = $answer2 = \Yii::$app->request->post('answer2');
        $model->answer3 = $answer3 = \Yii::$app->request->post('answer3');
        $model->answer4 = $answer4 = \Yii::$app->request->post('answer4');
        $checked =\Yii::$app->request->post('check');
        $check = implode(',',$checked);
        $model->check =$check ;
        if($model->save()){
            return $this->render('index');
        }
        else{
            return $this->render('many');
        }
    }
    public function actionDecide(){
        if(\Yii::$app->request->isGet){
            return $this->render('decide');
        }
        $model = new Decide();
        $model->title = $title = \Yii::$app->request->post('title');
        $model->check = $check = \Yii::$app->request->post('check');
        if($model->save()){
            echo '添加成功';
        }
    }
    public function actionExam(){
        $modelBill = new Bill;
        $bill_list = $modelBill->find()->one();
        $modelMany = new Many();
        $many_list = $modelMany->find()->one();
        $modelDecide = new Decide();
        $decide_list = $modelDecide->find()->one();
        $file = 'html/1.html';
        if(file_exists($file)){
            include_once $file;
        }else{
            ob_start();
            echo $this->render('exam',['bill_list'=>$bill_list,'many_list'=>$many_list,'decide_list'=>$decide_list]);
            $content = ob_get_contents();
            file_put_contents($file,$content);
            ob_end_flush();
        }
    }
    public function actionExamadd(){
//        Array ( [bill] => a [many] => Array ( [0] => a [1] => b ) [decide] => 1 )
        $num = 0;
        $bill = $_POST['bill'];
        $many = implode(',',\Yii::$app->request->post('many'));
        $decide = \Yii::$app->request->post('decide');
        $modelBill = new Bill;
        $bool1 = $modelBill->find()->where(['=','check',$bill])->one();
        if($bool1){
            $num=$num+5;
        }
        $modelMany = new Many();
        $bool2 = $modelMany->find()->where(['=','check',$many])->one();
        if($bool2){
            $num=$num+5;
        }
        $modelDecide = new Decide();
        $bool3 = $modelDecide->find()->where(['=','check',$decide])->one();
        if($bool3){
            $num=$num+5;
        }
        echo "本次考试分数为".'<h1>'.$num.'</h1>';
    }
}
