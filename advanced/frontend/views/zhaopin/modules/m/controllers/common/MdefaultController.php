<?php
/**
 * Created by PhpStorm.
 * User: cxcv4549
 * Date: 2017/9/13
 * Time: 19:34
 */

namespace app\modules\m\controllers\common;
use Yii;



class MdefaultController {
    public function child($data,$pid=0){
        $arr=array();
        foreach($data as $val){
            if($val['parent_id']==$pid){
                //获取子集数据
                if($val['parent_id']==0){
                    $val['down']=$this->jobInfo($val['job_cate_id']);
                }
                $val['child']=$this->child($data,$val['job_cate_id']);
                $arr[]=$val;
            }
        }
        return $arr;
    }
    public function jobInfo($id){
        $in_id=[];
        $job_id=\Yii::$app->db->createCommand('SELECT `job_cate_id` FROM job_cate WHERE `parent_id`='.$id)->queryAll();
        if($job_id){
            foreach($job_id as $k=>$v){
                $in_id[]=$v['job_cate_id'];
            }
        }

        $in_id=array_rand(array_flip($in_id),3);

        $where=implode(',',$in_id);

        $job_arr=\Yii::$app->db->createCommand('SELECT * FROM job_cate WHERE `parent_id` IN ('.$where.') ORDER BY `job_cate_sort` DESC')->queryAll();
        $key=array_rand($job_arr,3);

        foreach($key as $v){
            $res[]=$job_arr[$v];
        }
        return $res;
    }
    public function region_sort($db){
        $arr=$this->selAll($db);
        $arrs=[];
        foreach($arr as $k=>$v){
            $arrs[$v['initial']][]=$v;
        }
        return $arrs;
    }
    /*
     * @根据IP获取用户实际地址
     * */
    public function IpGain(){

    }
    /*---------------------------------------------------------------------------------------*/
    /*
     *公用增删改查
     *
     * */
    public function selOne($db,$where='1=1'){
        return $db::find()->where($where)->asArray()->one();
    }
    public function selAll($db,$where='1=1',$select='*'){
        return $db::find()->select($select)->where($where)->asArray()->all();
    }
    public function upOne($db,$data=[],$where){
        $result=$db::updateAll($data,$where);
        return $result?true:false;
    }
    public function addOne($table_name,$data){
       return  \yii::$app->db->createCommand()->insert($table_name,$data)->execute();
    }
    public function delOne($db,$where){
        return $db::findOne($where)->delete();
    }
}