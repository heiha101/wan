<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/9/3
 * Time: 20:01
 */

namespace app\modules\web\controllers;

use app\common\services\Urlservice;
use app\modules\web\controllers\common\BaseWebController;
use Yii;
use app\models\User;

class UserController extends BaseWebController{

    public function actionLogin(){
        //echo md5('54250');die;
        //echo md5('asfsdg');die;
        if(Yii::$app->request->isGet){
            $this->layout = 'user';
            return $this->render('login');
        }
        $u_name = $this->post('u_name');
        $u_pwd = $this->post('u_pwd');
        //echo $login_name;
        if(mb_strlen($u_name)<3){
            return "<script>alert('用户名或密码不正确');location.href='".Urlservice::buildWebUrl('/user/login')."'</script>";
        }
        if(strlen($u_pwd)<3){
            return "<script>alert('用户名或密码不正确');location.href='".Urlservice::buildWebUrl('/user/login')."'</script>";
        }
        $user_info = User::find()->where(['u_name'=>$u_name])->one();
        if(!$user_info){
            return "<script>alert('用户不存在');location.href='".Urlservice::buildWebUrl('/user/login')."'</script>";
        }
        $pwd_md5 = md5($u_pwd);
        if($user_info['u_pwd']!= $pwd_md5){
            return "<script>alert('密码不正确');location.href='".Urlservice::buildWebUrl('/user/login')."'</script>";
        }
        $cookie_info = md5($user_info['u_name'].md5($user_info['u_pwd'])).'#'.$user_info['u_id'];
        $this->set_Cookie('user_login',$cookie_info);
        return $this->redirect(Urlservice::buildWebUrl('/default/index'));

    }

    public function actionPwd(){
        return $this->render('pwd');
    }

    public function actionEdit(){
        return $this->render('edit');
    }
}