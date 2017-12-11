<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2017/9/16
 * Time: 9:56
 */

namespace app\modules\m\controllers;


use app\common\base\BaseController;
use app\models\JJianli;
use app\models\JUser;
use app\models\Postion;
use app\modules\m\controllers\common\MbaseController;

class JianliController extends MbaseController{
     public function actionIndex(){
         $common=new JUser();
         $id=1;
         $user_info = $common::find()->where(['j_id'=>$id])->asArray()->one();
         return $this->render('index',['list'=>$user_info]);
     }

    public function actionSetuser(){
        $common=new JUser();
        $name=$this->post('j_name');
        $academic=$this->post('j_academic');
        $photo=$this->post('tel');
        $email=$this->post('email');
        $state=$this->post('j_state');
        $id=1;
        $customer = $common::findOne($id);
        $customer->j_photo = $photo;
        $customer->j_email = $email;
        $customer->j_name = $name;
        $customer->j_academic = $academic;
        $customer->j_state = $state;
        $res=$customer->save();  // 等同于 $customer->update();
        if($res){
            echo "<script>alert('保存成功');location.href='/m/jianli/index'</script>";
        }
    }

    public function actionQitem(){
        $id=$this->post('j_id');
        $q_gong=$this->post('schoolName');
        $q_zhi=$this->post('expectPosition');
        $q_xin=$this->post('q_xin');
        $q_state=$this->post('type');
//        echo $q_gong.$q_xin.$q_zhi.$q_state;
        $common=new JJianli();
        $customer = $common::findOne($id);
        $customer->q_gong = $q_gong;
        $customer->q_zhi = $q_zhi;
        $customer->q_state = $q_state;
        $customer->q_xin = $q_xin;
        $res=$customer->save();  // 等同于 $customer->update();
        if($res){
            echo "<script>alert('保存成功');location.href='/m/jianli/index'</script>";
        }
    }

    public function actionGzjl(){
        $id=$this->post('j_id');
        $g_name=$this->post('g_name');
        $g_zhi=$this->post('g_zhi');
        $g_kai_year=$this->post('g_kai_year');
        $g_jie_year=$this->post('g_jie_year');
        $common=new JJianli();
        $customer = $common::findOne($id);
        $customer->g_name = $g_name;
        $customer->g_zhi = $g_zhi;
        $res=$customer->save();  // 等同于 $customer->update();
        $common=new JJianli();
//        $customer = $common::findOne($id);
//        $customer->g_kei = $g_kai_year;
//        $customer->g_jie = $g_jie_year;
//        $customer->save();  // 等同于 $customer->update();
        if($res){
            echo "<script>alert('保存成功');location.href='/m/jianli/index'</script>";
        }
    }

    public function actionJiao(){
        $id=$this->post('j_id');
        $j_class=$this->post('schoolName');
        $j_zhuan=$this->post('professionalName');
        $j_xueli=$this->post('j_xueli');
        $common=new JJianli();
        $customer = $common::findOne($id);
        $customer->j_class = $j_class;
        $customer->j_xueli = $j_xueli;
        $customer->j_zhuan = $j_zhuan;
        $res=$customer->save();  // 等同于 $customer->update();
        if($res){
            echo "<script>alert('保存成功');location.href='/m/jianli/index'</script>";
        }

    }

    public function actionWo(){
        $id=$this->post('j_id');
        $z_wo=$this->post('selfDescription');
        $common=new JJianli();
        $customer = $common::findOne($id);
        $customer->z_wo = $z_wo;
        $res=$customer->save();  // 等同于 $customer->update();
        if($res){
            echo "<script>alert('保存成功');location.href='/m/jianli/index'</script>";
        }
    }

    public function actionLianjie(){
        $id=$this->post('j_id');
        $z_show=$this->post('workLink');
        $z_centent=$this->post('workDescription');
        $common=new JJianli();
        $customer = $common::findOne($id);
        $customer->z_show = $z_show;
        $customer->z_centent = $z_centent;
        $res=$customer->save();  // 等同于 $customer->update();
        if($res){
            echo "<script>alert('保存成功');location.href='/m/jianli/index'</script>";
        }
    }

    public function actionCollections(){
        $common=new Postion();
        $user_info = $common::find()->where(['state'=>1])->asArray()->all();
        return $this->render('collections',['list'=>$user_info]);
    }

    public function actionQu(){
        $id=$this->get('id');
        $common=new Postion();
        $customer = $common::findOne($id);
        $customer-> state = '2';
        $res=$customer->save();  // 等同于 $customer->update();
        if($res){
            echo "<script>alert('已取消');location.href='/m/jianli/collections'</script>";
        }else{
            echo 'shibai';
        }
    }

    public function actionPreview(){
        $id=$this->get('id');
        $data=new JUser();
        $res = $data::find()->where(['j_id'=>$id])->asArray()->one();
        $common=new JJianli();
        $user_info = $common::find()->where(['j_id'=>$id])->asArray()->one();
        return $this->render('preview',['list'=>$user_info,'data'=>$res]);
    }

    public function actionFile(){
        $file        =$_FILES['newResume'];
        $img=explode('.',$file['name']);
        $time=time();
        $new_img='img/'.$time.'.'.$img[1];
        $up=move_uploaded_file($file['tmp_name'],$new_img);
        if($up){
            echo "<script>alert('您的简历已经上传成功');location.href='/m/jianli/index'</script>";
        }else{
            echo "<script>alert('上传失败');location.href='/m/jianli/index'</script>";
        }
    }

}













