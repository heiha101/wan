<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/9/17
 * Time: 19:37
 */

namespace app\modules\m\controllers\common;


class Mlogin {
    public function code_null($arr=array()){
        foreach($arr as $k=>$v){
            if(!$v){
                return false;
            }
        }
        return $arr;
    }
    public function user_login($type,$data){
        if($type==1){
             $user=$data['u_name'];
             $id=$data['u_id'];
             $name='user_login';
        }else{
             $user=$data['c_name'];
             $id=$data['c_id'];
             $name='company_login';
        }
        $cookie = $type.'|'.md5($user).'#'.$id;
        return ['name'=>$name,'cookie'=>$cookie];
    }
    public function usersalt($type,$arr=array(),$pwd){
        if($type==1){
            if($arr['u_pwd'].$arr['salt']!=md5($pwd).$arr['salt']){
                return false;
            }else{
                return true;
            }
        }else{
            if($arr['c_pwd'].$arr['c_salf']!=md5($pwd).$arr['c_salf']){
                return false;
            }else{
                return true;
            }
        }
    }

}