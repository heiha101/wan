<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Zhou;
use frontend\models\Lick;
use Illuminate\Support\Facades\Session;


class ZhouController extends Controller{
    public $layouts = 'zhou';
    public $enableCsrfValidation=false;
    public function actionShow1(){
		return $this->render('show1');		
	}

	public function actionData_show(){
		$iphone = Yii::$app->session['iphone'];
        $zhu = new zhou();
        $aa = $zhu->find()->where(['iphone'=>$iphone])->asArray()->one();
        return $this->render('show1',['data'=>$aa]);
	}

	public function actionData_show1(){
		$data = Yii::$app->request->post();
		if($data['pwd'] != $data['pwd1']){
			return $this->redirect(array('/zhou/show1'));
		}
		else{
           $zhou = new Zhou();
           $all = $zhou->find()->asArray()->all();
           foreach($all as $k=>$v){
           	    $iphone[$k] = $v['iphone'];
           }
           if(!isset($iphone)){
                $iphone = array();
           }
           
           $name = Yii::$app->session['iphone'];
           if(!in_array($name, $iphone)){
              $zhou->iphone = $data['iphone'];
               $zhou->pwd = $data['pwd'];
               $zhou->insert();
              Yii::$app->session['iphone'] = $data['iphone'];
           }        
           return $this->render('show2');
		}
	}

	public function actionData_show3(){
		$data = Yii::$app->request->post();
		$iphone = Yii::$app->session['iphone'];
		// $res = Yii::$app->db->createcommand()->update('zhu',['iphone'=>$iphone],'name="'.$data['name'].'" and sheng="'.$data['sheng'].'" and zhi="'.$data['zhi'].'"')->execute();
		$userInfo = Zhou::find()->where(['iphone' => $iphone])->one();
        $userInfo->name = $data['name'];
        $userInfo->sheng = $data['sheng'];
        $userInfo->zhi = $data['zhi'];
        $userInfo->save();

        $lick = new Lick();
        $aa = $lick->find()->asArray()->all();
		return $this->render('show3',array('lick'=>$aa));
	}

	public function actionShow2(){
		$iphone = Yii::$app->session['iphone'];
		$zhu = new zhou();
		$all = $zhu->find()->where(['iphone'=>$iphone])->asArray()->one();
		return $this->render('show2',array('data'=>$all));
	}

	public function actionShow3(){
		$data = Yii::$app->request->post();
		$iphone = Yii::$app->session['iphone'];
		$userInfo = Zhou::find()->where(['iphone' => $iphone])->one();
        $userInfo->lick = $data['lack'];
        $userInfo->save();
	}
}