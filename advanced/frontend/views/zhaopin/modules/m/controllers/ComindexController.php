<?php
/**
 * Created by PhpStorm.
 * User: cxcv4549
 * Date: 2017/9/17
 * Time: 19:16
 */

namespace app\modules\m\controllers;
use app\common\services\Urlservice;
use app\models\CompanyInfo;
use app\models\JobCate;
use app\models\CompanyBoon;
use app\models\Industy;
use app\models\Region;
use app\modules\m\controllers\common\MdefaultController;
use app\modules\m\controllers\common\MbaseController;

class ComindexController extends MbaseController{


    public $layout=false;

    //公用方法对象
    private $obj=null;
    private $comInfo=null;
    private $comboon=null;
    private $Region=null;
    private $Industy=null;

    private $data=[];
    private $cominfo_arr=null;
    private  $com=[];
    private $com_id=null;


    public function init(){
        parent::init();
        $this->com=$this->get_cookie('company_login');
        if(!$this->com) $this->redirect(Urlservice::buildMUrl('/login/login'));
        $this->com_id=substr($this->com,strrpos($this->com,'#')+1);
        $this->obj =new MdefaultController();
        $this->comInfo = new CompanyInfo();
        $this->comboon = new CompanyBoon();
        $this->Industy = new Industy();
        $this->Region = new Region();
        $this->cominfo_arr=$this->users_id();
    }
    private function users_id(){
        $f_id=$this->obj->selOne($this->comInfo,['c_id'=>$this->com_id]);
        return $f_id;
    }

    public function actionIndex(){
        $data=$this->obj->selOne($this->comInfo,['c_id'=>$this->com_id]);
        $boon_arr=$this->obj->selAll($this->comboon,['f_id'=>$this->cominfo_arr['f_id']]);
        return $this->render('myhome',['data'=>$data,'boon_arr'=>$boon_arr]);
    }
    public function actionLogoSave(){
        $f_logo=$this->fileload($_FILES['f_logo']);
        if(!$f_logo)return 0;
        $result=$this->obj->upOne($this->comInfo,['f_logo'=>$f_logo],'c_id='.$this->com_id);
        return $result?json_encode($f_logo):-1;
    }
    public function actionNameSave(){
        $post=$_POST;
        $result=$this->obj->upOne($this->comInfo,$post,'c_id='.$this->com_id);
        return $result?json_encode($post):0;
    }
    public function actionUp_boon(){
        $str=$this->post('boon_str');
        $boon_str=trim($str,',');
        $boon_arr=explode(',',$boon_str);
        foreach($boon_arr as $k=>$v){
           $code= $this->obj->selOne($this->comboon,'boon_name="'.$v.'"');
            if($code) continue;
            $arr=$this->obj->addOne('company_boon',['f_id'=>$this->com_id,'boon_name'=>$v]);
            if(!$arr) return 0;
        }
            $boon_data=$this->obj->selAll($this->comboon,'f_id='.$this->cominfo_arr['f_id']);
            return json_encode($boon_data);
    }
    public function actionDel_boon(){
        $id=$this->post('boon_id');
        $result=$this->obj->delOne($this->comboon,['boon_id'=>$id]);
        if($result){
            return 1;
        }else{
            return 0;
        }
    }
}