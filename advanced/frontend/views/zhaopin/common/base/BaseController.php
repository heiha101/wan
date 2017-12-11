<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/8/31
 * Time: 8:38
 */
namespace app\common\base;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
class BaseController extends Controller{
    public $enableCsrfValidation=false;
   public function get($key,$value=null){
       return \yii::$app->request->get($key,$value);
   }

    public function post($key,$value=null){
        return \yii::$app->request->post($key,$value);
    }

    public function isPost(){
        return \yii::$app->request->isPost;
    }

    public function isGet(){
        return \yii::$app->request->isGet;
    }

    public function isAjax(){
        return \yii::$app->request->isAjax;
    }

    public function set_cookie($key,$value){
        $cookie=\yii::$app->response->cookies;
        $cookie->add(new \yii\web\Cookie([
            'name'=>$key,
            'value'=>$value,
        ]));
    }

    public function get_cookie($key){
        $cookie=\yii::$app->request->cookies;
        return $cookie->getValue($key);
    }

    public function del_cookie($name){
        \yii::$app->response->cookies->remove($name);
    }
    //设置session
    public function set_Session($name,$array){
        \Yii::$app->session->set($name,$array);
    }
    //接收session
    public function get_Session($name){
        $session=\Yii::$app->session;
        if(!$session->has($name)) return false;
        return $session->get($name);

    }
    public function sort_arr($file){
        $arr=[];
        foreach($file as $key => $v){
            foreach($v as $k1 => $v1){
                $arr[$k1][$key] = $v1;
            }
        }
        return $arr;
    }
    /*
     * @ $file   为$_FILES
     * @$controller 模块名称，或者自定义
     * */
    public function fileload($file,$controller='webs'){
         if(!$this->code_type($file['type'])) return false;
         $arr=$this->move_file($file['name'],$file['tmp_name'],$controller);
        return $arr;
    }
    public function code_type($array){
        $type=['image/jpeg','image/png','image/gif'];
            if(!in_array($array,$type)){
                return false;
            }
        return true;
    }
    public function move_file($name,$tmp_name,$controller){
        $dir_url='upload_imgs/'.$controller.'/'.date('Y-m-d');
        if(!file_exists($dir_url)){
            mkdir($dir_url,0777,true);
        }
        $url=$dir_url.'/'.time().mt_rand(100000,999999).substr($name,strrpos($name,'.'));
        $res=move_uploaded_file($tmp_name,$url);
        return $res?$url:false;
    }

    public function random_str($length=16)
    {
        //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
        $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

        $str = '';
        $arr_len = count($arr);
        for ($i = 0; $i < $length; $i++)
        {
            $rand = mt_rand(0, $arr_len-1);
            $str.=$arr[$rand];
        }
        return $str;
    }

    /*
     * @throw  抛出响应
     * 例 throw $this->iError('xxxx');
     * */
    public function iError($str=''){
        $this->layout=false;
        return  new NotFoundHttpException('Error:'.$str);
    }

    public function regionInfo($info,$pid=0,$level=0){
        static $data=array();
        foreach ($info as $k=>$v) {
            if($v['parent_id']==$pid){
                $v['level']=$level;
                $data[]=$v;
                $this->regionInfo($info,$v['job_cate_id'],$level+2);
            }
        }
        return $data;
    }

    public function seedHandle($val){

        if($val==1)return '初创型';
        if($val==2)return '成长型';
        if($val==3)return '成熟型';
        if($val==4)return '以上市';
    }
}











