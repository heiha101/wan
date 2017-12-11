<?php
/**
 * Created by PhpStorm.
 * User: cxcv4549
 * Date: 2017/9/5
 * Time: 15:15
 */

namespace app\modules\web\controllers\common;
use app\models\Company;
use app\models\CompanyInfo;
use app\models\Equity;
use app\models\Postion;
use yii\data\Pagination;
class ComPage{
    public function postion_where($job_get,$status_get){
        $where=[];
        !empty($status_get) && $where[]='status='.$status_get;
        !empty($job_get) && $where[]='postion_name="'.$job_get.'"';
        empty($where) && $where='1=1';
        return $where;
    }
    public function intoWay(array $where,$way='and'){
        $str='';
        foreach($where as $k=>$v){
            if(isset($mark)){
                $str.=' '.$way.' ';
            }
            $str.=$v;
            $mark=1;
        }
        return $str;
    }
public function comIndex_where($status='',$mix_kw=''){
    $where='1=1';
    if($status){
        $where=['status'=>$status];
        if($mix_kw) $where=['and','status='.$status,['or','c_name like "%'.$mix_kw.'%"', 'c_email like "%'.$mix_kw.'%"']];
    }
    if($mix_kw && !$status)$where=['or','c_name like "%'.$mix_kw.'%"', 'c_email like "%'.$mix_kw.'%"'];
    return $where;
}
public function c_page($obj,$where,$num=5){
    $db=$obj::find()->where($where);
    $count=$db->count();
    $pages = new Pagination(['totalCount' =>$count,'pagesize'=>$num]);
    $model=$db->offset($pages->offset)->limit($pages->limit)->asArray()->all();

    return ['pages'=>$pages,'model'=>$model,'count'=>$count,'num'=>count($model)];
}
    public function code_null($arr=array()){
        foreach($arr as $k=>$v){
            if(!$v){
                return false;
            }
        }
        return $arr;
    }
    public function add_user(array $data){
        if(!$data) return false;
        $data['c_settime']=date('Y-m-d H:i:s');
        $code=\yii::$app->db->createCommand()->insert('company',$data)->execute();
        return $code?true:false;
    }
    /*
     * 审核账号状态
     * */
    public function saveStatus($status,$c_id){
        $status=$status*1;
        $result=Company::updateAll(['status'=>$status],['c_id'=>$c_id]);
        return $result?true:false;
    }
    public function savePos($status,$postion_id){
        $status=$status*1;
        $result=Postion::updateAll(['status'=>$status],['postion_id'=>$postion_id]);
        return $result?true:false;
    }
    public function findUser($where){
        $data=CompanyInfo::find()->where($where)->asArray()->one();
        $data['f_scale']=explode(',',$data['f_scale']);
        return $data;

    }
    public function findOnce($db,$where='1=1'){
        return $db::find()->where($where)->asArray()->one();
    }
    public function findEver($db,$where='1=1'){
        return $db::find()->where($where)->asArray()->all();
    }
    public function saveInfo($db,$arr=array(),$c_id){

        $result=$db::updateAll($arr,['c_id'=>$c_id]);
        return $result?true:false;
    }
    public function addPhoto($photo,$id){
        if(!$photo)return false;
        $f_id=$this->findUser(['c_id'=>$id]);
        foreach($photo as $k=>$v){
            $code=\yii::$app->db->createCommand()->insert('company_photo',['f_id'=>$f_id['f_id'],'f_photo'=>$v])->execute();
            if(!$code) return false;
        }
        return true;
    }

}