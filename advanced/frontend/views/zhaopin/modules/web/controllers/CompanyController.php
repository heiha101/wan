<?php
/**
 * Created by PhpStorm.
 * User: cxcv4549
 * Date: 2017/9/2
 * Time: 10:10
 */
namespace app\modules\web\controllers;


use app\common\services\Urlservice;
use app\models\CompanyInfo;
use app\models\Equity;
use  app\common\base\BaseController;
use app\modules\web\controllers\common\BaseWebController;
use app\models\Company;
use app\models\JobCate;
use app\models\Postion;
use app\models\CompanyPhoto;
use app\models\Industy;
use yii\helpers\Url;
use app\models\Region;
use app\modules\web\controllers\common\ComPage;
class CompanyController extends BaseWebController{
    //models对象属性
    public $ComPage=null;
    public $Company=null;
    public $ComInfo=null;
    public $Equity=null;
    public $Industy=null;
    public $Region=null;
    public $Job_cate=null;
    public $Postion=null;

   public function init(){
       parent::init();
       $this->ComPage = new ComPage();
       $this->Company = new Company();
       $this->ComInfo = new CompanyInfo();
       $this->Equity = new Equity();
       $this->Industy = new Industy();
       $this->Region = new Region();
       $this->Job_cate = new JobCate();
       $this->Postion = new Postion();
    }
    public function actionIndex()
    {
       $status=$this->get('status','');
       $mix_kw=$this->get('mix_kw','');
       $where=$this->ComPage->comIndex_where($status,$mix_kw);
       $arr=$this->ComPage->c_page($this->Company,$where);
       return $this->render('company_index',$arr);
    }

    //添加一个账号
    public function actionCreate_user(){
        if($this->isPost()){
            $data= \yii::$app->request->post();
            $code_user=$this->ComPage->findOnce($this->Company,'c_name="'.$data['c_name'].'"');
            if($code_user) throw $this->iError('账号已存在');
            $data=$this->ComPage->code_null($data);
            if(!$data) throw $this->iError('表单不能为空');
            $data['c_salf']=$this->random_str();
            $res=$this->ComPage->add_user($data);
            if(!$res) throw $this->iError('添加失败');
            $this->redirect('/web/company/index');
        }
        return $this->render('set');
    }

    //状态审核
    public function actionUpStatus(){
        $c_id=$this->post('c_id');
        $status=$this->post('status');
        $result=$this->ComPage->saveStatus($status,$c_id);
        echo $result?1:0;
    }

    //详细公司信息
    public function actionComInfo(){
        $c_id=$this->get('id','');
        $data=$this->ComPage->findUser(['c_id'=>$c_id]);
        if(!$data)throw $this->iError('未完善的个人信息！！');
        $data['seedtime']=$this->seedHandle($data['seedtime']);
        $data['b_id']=$this->ComPage->findEver($this->Industy,'i_id in ('.$data['b_id'].')');
        return $this->render('commessage',['c_id'=>$c_id,'data'=>$data]);
    }

    //修改公司信息
    public function actionSetMessage(){
        $c_id=$this->get('id','');

        $data=$this->ComPage->findUser(['c_id'=>$c_id]);

        $e_id=$this->ComPage->findEver($this->Equity);

        $industy=$this->ComPage->findEver($this->Industy);

        $region=$this->ComPage->findEver($this->Region);

        if($this->isPost()){
            if($_FILES['f_logo']['name']){

                $f_logo=$this->fileload($_FILES['f_logo']);

                if($f_logo) $_POST['f_logo']=$f_logo;

            }
            if($_FILES['f_photo']['name'][0]){

                $arr=$this->sort_arr($_FILES['f_photo']);

                foreach($arr as $k=>$v){
                    $photo[]=$this->fileload($v);
                }

                $this->ComPage->addPhoto($photo,$_POST['c_id']);

            }

            $_POST['b_id']=trim($_POST['b_id'],',');
            $_POST['f_scale']=implode(',',$_POST['f_scale']);

            $res=$this->ComPage->saveInfo($this->ComInfo,$_POST,$_POST['c_id']);
            if($res){
                return $this->redirect(Urlservice::buildWebUrl('/company/com-info?id='.$_POST['c_id']))->send();
            }else{
                throw $this->iError('修改失败');
            }
        }
        return $this->render('setmessage',['region'=>$region,'c_id'=>$c_id,'data'=>$data,'e_id'=>$e_id,'industy'=>$industy]);
    }

    //发布职位
    public function actionComPostion(){
           $job_arr=$this->ComPage->findEver($this->Job_cate);
           $job_data=$this->regionInfo($job_arr);
            if($this->isGet()){
                $job_get=$this->get('job_cate_id','');
                $status_get=$this->get('status','');
                $where=$this->ComPage->postion_where($job_get,$status_get);
                if(is_array($where))  $where=$this->ComPage->intoWay($where);

            }
            !isset($where) && $where='1=1';
            $model=$this->ComPage->c_page($this->Postion,$where);


        return $this->render('company_postion',['job'=>$job_data,'model'=>$model['model'],'count'=>$model['count'],'pages'=>$model['pages'],'num'=>$model['num']]);
    }
    public function actionUppos(){
        $postion_id=$this->post('postion_id');
        $status=$this->post('status');
        $result=$this->ComPage->savePos($status,$postion_id);
        echo $result?1:0;
    }
}