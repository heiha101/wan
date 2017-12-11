<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 2017/9/12
 * Time: 10:38
 */

namespace app\modules\m\controllers;

use app\common\services\Urlservice;
use app\common\base\BaseController;
use Yii;
use app\models\User;
use app\models\Company;
use app\modules\m\controllers\common\Mlogin;
use app\modules\m\controllers\common\MdefaultController;
use yii\web\NotFoundHttpException;
class LoginController extends BaseController{
    private $user_log=null;
    private $sql_obj=null;

    public function init(){
        parent::init();
        $this->user_log=new Mlogin();
        $this->sql_obj= new MdefaultController();
    }
    public function actionLogin(){
        if($this->isPost()){
            $type=$this->post('type');
            $u_email = $this->post('u_email');
            $u_pwd = $this->post('u_pwd');
            //验证传值非空
            $user_arr=$this->user_log->code_null([$u_email,$u_pwd]);

            if(!$user_arr) throw new NotFoundHttpException('Error:不能为空');
            //判断是公司登录还是用户登录
            if($type==1){
                $db=new User();
                $where=['u_email'=>$user_arr[0]];
            }else{
                $db=new Company();
                $where=['c_email'=>$user_arr[0]];
            }
            $user=$this->sql_obj->selOne($db,$where);
            if(!$user) throw new NotFoundHttpException('Error:用户名或者密码 错误');

            $code=$this->user_log->usersalt($type,$user,$u_pwd);
            if(!$code) throw new NotFoundHttpException('Error:用户名或者密码错误');
            $cookie_arr=$this->user_log->user_login($type,$user);
            $this->set_Cookie($cookie_arr['name'],$cookie_arr['cookie']);
            return $this->redirect(Urlservice::buildMUrl('/default/index'));
        }

        return $this->renderPartial('login');

    }


    public function actionRegister(){

        if($this->isPost()){
            $type = $this->post('type');
            $email = $this->post('u_email');
            $pwd = $this->post('u_pwd');

            if($type == 1){
                $user = User::find()->where(['u_email'=>$email])->all();
                if($user){
                    return "<script>alert('个人邮箱已被注册');location.href='".Urlservice::buildMUrl('/login/register')."'</script>";
                }else{
                    $info = new User();
                    $info->u_email = $email;
                    $info->u_pwd = $pwd;
                    $res = $info->save();
                    if($res){
                        return "<script>alert('注册成功');location.href='".Urlservice::buildMUrl('/login/login')."'</script>";
                    }
                }
            }else{

                $user_arr=$this->user_log->code_null([$email,$pwd]);
                if(!$user_arr) throw new NotFoundHttpException('Error:不能为空');
                $db=new Company();
                $where=['c_email'=>$user_arr[0]];

            }
            $user=$this->sql_obj->selOne($db,$where);
            if($user){
                return "<script>alert('公司邮箱已被注册');location.href='".Urlservice::buildMUrl('/login/register')."'</script>";
            }else{
                //echo 1;die;

                $db->c_email = $user_arr[0];
                $db->c_pwd = $user_arr[1];
                $res = $db->save();

                if(!$res){
                    return "<script>alert('注册成功');location.href='".Urlservice::buildMUrl('/login/login')."'</script>";
                }
            }
        }
        return $this->renderPartial('register');
    }
}