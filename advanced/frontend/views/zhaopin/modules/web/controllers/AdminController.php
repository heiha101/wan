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
//use Codeception\Step\Comment;
use \yii\helpers\Html;
use Yii;
use app\models\Admin;
use app\models\Comment;
use yii\web\Cookie;

class AdminController extends BaseWebController{

    public function actionLogin(){

        //echo md5('54250');die;
        //echo md5('asfsdg');die;
        if(Yii::$app->request->isGet){
            $this->layout = 'admin';
            return $this->render('login');
        }
        $adm_name = $this->post('adm_name');
        $adm_pwd = $this->post('adm_pwd');
        //echo $login_name;
        if(mb_strlen($adm_name)<3){
            return "<script>alert('用户名或密码不正确');location.href='".Urlservice::buildWebUrl('/admin/login')."'</script>";
        }
        if(strlen($adm_pwd)<3){
            return "<script>alert('密码不正确');location.href='".Urlservice::buildWebUrl('/admin/login')."'</script>";
        }
        $user_info = Admin::find()->where(['adm_name'=>$adm_name])->one();
        if(!$user_info){
            return "<script>alert('用户不存在');location.href='".Urlservice::buildWebUrl('/admin/login')."'</script>";
        }
        $pwd_md5 = md5($adm_pwd);
        if($user_info['adm_pwd']!= $pwd_md5){
            return "<script>alert('密码不正确');location.href='".Urlservice::buildWebUrl('/admin/login')."'</script>";
        }
        $cookie_info = md5($user_info['adm_name'].md5($user_info['adm_pwd'])).'#'.$user_info['adm_id'];
        $this->set_Cookie('user_login',$cookie_info);
        return $this->redirect(Urlservice::buildWebUrl('/dashboard/index'));

    }

    public function actionPwd(){
        return $this->render('pwd',['info'=>$this->current_user]);
    }

    public function actionPwddo(){
        $res = $this->get_cookie('user_login');
        $adm_id = substr($res,strrpos($res,'#')+1);
        $adm_pwd = $this->post('adm_pwd');
        $new_pwd = $this->post('new_pwd');
        $pwd_md5 = md5($adm_pwd);
        $new_pwd_md5 = md5($new_pwd);
        $adm_info = Admin::find()->where(['adm_pwd'=>$pwd_md5])->one();
        if(!$adm_info){
            echo "1";
        }else{
            $res = Yii::$app->db->createCommand()->update('admin', ['adm_pwd'=>$new_pwd_md5],["adm_id" => $adm_id])->execute();
            if($res){
                echo 0;
            }
        }
    }

    public function actionEdit(){
        if(\Yii::$app->request->isGet){
            return $this->render('edit',['info'=>$this->current_user]);
        }
    }

    public function actionEditdo(){

        $res = $this->get_cookie('user_login');

        $adm_id = substr($res,strrpos($res,'#')+1);
        //var_dump($adm_id);die;
        $nikename = $this->post('nikename');
        $photo = $this->post('photo');
        $email = $this->post('email');
        $res = \Yii::$app->db->createCommand()->update('admin', ['nikename'=>$nikename,'photo'=>$photo,'email'=>$email],["adm_id" => $adm_id])->execute();
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function actionLogout(){
        $res = $this->del_cookie('user_login');
        if(!$res){
            return $this->redirect(Urlservice::buildwebUrl('/admin/login'));
        }
    }

    public function actionIndex()
    {
        if($this->isAjax()){
            $status=$this->get('status');
            $mix_kw=$this->get('mix_kw');
            $where = 'where 1 = 1';
            if($status){
                $where.= ' and study = '.$status;
            }
            if($mix_kw){
                $where.= ' and adm_name LIKE "%'.$mix_kw.'%" or photo LIKE "%'.$mix_kw.'%"';
            }
            $command = \Yii::$app->db->createCommand('select COUNT(*) from admin '.$where )->queryOne();
            //总数量
            $count_num = array_shift($command);
            //每页显示条数
            $size=2;
            //总页数
            $page_num = ceil($count_num / $size);
            //当前页
            $p=empty($_GET['p'])?1:$_GET['p'];
            //迁移量
            $limit=($p-1)*$size;
            //上一页
            $up=$p-1<1?1:$p-1;
            //下一页
            $dome=$p+1>$page_num?$page_num:$p+1;
            $command = \Yii::$app->db->createCommand('select * from admin '.$where.'  LIMIT '.$limit.','.$size)->queryAll();
            $arr=[
                'p'=>$p,
                'up'=>$up,
                'dome'=>$dome,
                'page_num'=>$page_num
            ];
            $res=[
                'arr'=>$arr,
                'list'=>$command
            ];
            echo json_encode($res);
        }else{
            $command = \Yii::$app->db->createCommand("select COUNT(*) from admin ")->queryOne();
            //总数量
            $count_num = array_shift($command);
            //每页显示条数
            $size=2;
            //总页数
            $page_num = ceil($count_num / $size);
            //当前页
            $p=empty($_GET['p'])?1:$_GET['p'];
            //迁移量
            $limit=($p-1)*$size;
            //上一页
            $up=$p-1<1?1:$p-1;
            //下一页
            $dome=$p+1>$page_num?$page_num:$p+1;
            $command = \Yii::$app->db->createCommand("select * from admin LIMIT $limit,$size")->queryAll();
            $arr=['up'=>$up,'dome'=>$dome,'page_num'=>$page_num,'p'=>$p];
            return $this->render('index',['list'=>$command,'arr'=>$arr]);
        }
    }

    public function actionSet()
    {
        $common=new Admin();
        if($this->isPost()){
            $login_name =$this->post('login_name');
            $user_info = $common::find()->where(['adm_name'=>$login_name])->asArray()->one();
            if($user_info['adm_name']==$login_name){
                echo "<script>alert('该用户已经注册过了');location.href='/web/admin/set'</script>";
            }
            $login_pwd  =$this->post('login_pwd');
            $photo      =$this->post('photo');
            $sex        =$this->post('sex');
            $email      =$this->post('email');
            $nikename   =$this->post('nikename');
            $file        =$_FILES['img'];
            $img=explode('.',$file['name']);
            $time=time();
            $new_img='img/'.$time.'.'.$img[1];
            $up=move_uploaded_file($file['tmp_name'],$new_img);

            if(mb_strlen($login_name)<2){
                echo "<script>alert('名字格式不符');location.href='/web/admin/set'</script>";
            }
            if(mb_strlen($login_pwd)<2){
                echo "<script>alert('密码格式不符');location.href='/web/admin/set'</script>";
            }
            if(mb_strlen($photo)<2){
                echo "<script>alert('手机格式不符');location.href='/web/admin/set'</script>";
            }
            if(mb_strlen($email)<2){
                echo "<script>alert('邮箱格式不符');location.href='/web/admin/set'</script>";
            }
            if(mb_strlen($nikename)<2){
                echo "<script>alert('昵称格式不符');location.href='/web/admin/set'</script>";
            }
            $new_pwd=Html::encode(md5($login_pwd));
            $common->adm_name=Html::encode($login_name);
            $common->adm_pwd=Html::encode($new_pwd);
            $common->photo=Html::encode($photo);
            $common->email=Html::encode($email);
            $common->sex=Html::encode($sex);
            $common->nikename=Html::encode($nikename);
            $common->img='/'.$new_img;
            $common->save();
            return $this->redirect('/web/admin/index');
        }else{
            return $this->render('set');
        }
    }

    public function actionAdmin_del(){
        $study=$this->get('study');
        $id= $this->get('adm_id');
        if($study==1){
            $new_id=2;
            $customer = Admin::findOne($id);
            $customer->study = $new_id;
            $common= $customer->save();
            if($common){
                return $this->redirect('/web/admin/index');
            }
        }else {
            $new_id=1;
            $customer = Admin::findOne($id);
            $customer->study = $new_id;
            $common= $customer->save();
            if($common){
                return $this->redirect('/web/admin/index');
            }
        }
    }

    public function actionInfo(){
        $id    = $this->get('id');
        $admin = new Admin();
        $customers = $admin::find()->where("adm_id = $id")->asArray()->one();
        //var_dump($customers);
        return $this->render('info',['list'=>$customers]);
    }

    public function actionUpdate(){
        $admin = new Admin();
        if($this->isPost()){
            $id=$this->post('id');
            $file       = $_FILES['img'];
            $img=explode('.',$file['name']);
            $time=time();
            $new_img='img/'.$time.'.'.$img[1];
            $up=move_uploaded_file($file['tmp_name'],$new_img);
            $photo     = $this->post('photo');
            $email     = $this->post('email');
            $nikename  = $this->post('nikename');
            $sex       = $this->post('sex');
            // 更新现有客户记录
            $customer = Admin::findOne($id);
            $customer->photo = $photo;
            $customer->email = $email;
            $customer->sex = $sex;
            $customer->nikename = $nikename;
            $customer->img = '/'.$new_img;
            $customer->update();  // 等同于 $customer->update();
            return $this->redirect('/web/admin/index');
        }else{
            $id=$this->get('id');
            $customers = $admin::find()->where("adm_id = $id")->asArray()->one();
            return $this->render('update',['list'=>$customers]);
        }
    }

       public function actionSign_info(){
           $cookie = $this->get_cookie('user_login');
           list($name,$id)=explode('#',$cookie);
           $admin = new Admin();
           $customers = $admin::find()->where("adm_id = $id")->asArray()->one();
           //var_dump($customers);
           return $this->render('sign_info',['list'=>$customers]);
       }

    public function actionSign(){
        $id     =  $this->get('id');
        $common=new Admin();
        $customers = $common::find()->where("adm_id = $id")->asArray()->one();
        $cuadd=$customers['adm_key']-1;
//        echo date('H:i:s',$new);die;
//        $new= date('H:i:s',time());
//        echo $new-('00:00:00');die;
//        echo $new-('2017-09-08 09:30:12');die;
        $sign=$this->get_cookie('sign');
        if($sign==$id){
            echo "<script>alert('您今日已经签到过了！！');location.href='/web/admin/sign_info';</script>";
        }else{
            if($customers['adm_key']==$cuadd){
                echo "<script>alert('您今日已经签到过了！！');location.href='/web/admin/sign_info';</script>";
            }else{
                $update=Admin::findOne($id);
                $update->adm_key=$customers['adm_key']+1;
                $update->save();
                $new=strtotime(date('Y-m-d', strtotime('+1 day')));
                $cookie =  new Cookie();
                $cookie->name  = 'sign';
                $cookie->value = $id;
                $cookie->httpOnly = true;
                $cookie->expire = $new;
                yii::$app->response->cookies->add($cookie);
                echo "<script>alert('签到成功');location.href='/web/admin/sign_info';</script>";
            }
        }
    }

    public function actionLike(){
        $cookie = $this->get_cookie('user_login');
        list($name,$id)=explode('#',$cookie);
        $admin = new Admin();
        $customers = $admin::find()->where("adm_id = $id")->asArray()->one();
        return $this->render('like',['list'=>$customers]);
    }

    public function actionOne(){
        $name=$this->get('name');
        $admin = new Admin();
        $customers = $admin::find()->where("adm_name = '$name'")->asArray()->one();
        if($customers){
            echo 1;
        }else{
            echo 2;
        }
    }

    public function actionComment(){
        if($this->isPost()){
            $com_user=$this->post('com_user');
            $user=$this->post('user');
            $content=$this->post('content');
            $file       = $_FILES['img'];
            $img=explode('.',$file['name']);
            $time=time();
            $new_img='img/'.$time.'.'.$img[1];
            $up=move_uploaded_file($file['tmp_name'],$new_img);
            $comment = new Comment();
            $comment->user=$user;
            $comment->com_user=$com_user;
            $comment->content=$content;
            $comment->img='/'.$new_img;
            $comment->save();
            return $this->redirect('/web/admin/comment');
        }else{
            $comment = new Comment();
            $admin = new Admin();
            $are = $comment::find()->orderBy('id DESC')->asArray()->all();
            $user = $admin::find()->where('study = 1')->asArray()->all();
            //$user=\Yii::$app->db->createCommand("SELECT * from comment WHERE study = 1 ORDER BY id ASC")->queryAll();
            $cookie = $this->get_cookie('user_login');
            list($name,$id)=explode('#',$cookie);
            $customers = $admin::find()->where("adm_id = $id")->asArray()->one();
            return $this->render('comment',['list'=>$customers,'user'=>$user,'are'=>$are]);
        }
    }
}















