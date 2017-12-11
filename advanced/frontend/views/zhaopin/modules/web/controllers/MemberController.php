<?php
/**
 * Created by PhpStorm.
 * User: 张治国
 * Date: 2017/9/3
 * Time: 19:48
 */

namespace app\modules\web\controllers;

use app\modules\web\controllers\common\BaseWebController;
use app\models\User;
use yii\web\Controller;
use yii\data\Pagination;

/**
 * Default controller for the `web` module
 */
class MemberController extends BaseWebController
{
    /**
     *   添加
     */
    public function actionAdd()
    {
       return $this->render('add');
    }
    public function actionIndex()
    {
        $u_tel = $this->post('u_tel');
        $u_email = $this->post('u_email');
        $u_name = $this->post('u_name');
        $u_pwd = $this->post('u_pwd');

        $data = new User();
        $data->u_name = $u_name;
        $data->u_pwd = md5($u_pwd);
        $data->u_email = $u_email;
        $data->u_tel = $u_tel;
        $rest = $data->save();
        if($rest)
        {
            echo "<script>alert('添加成功');location.href='/web/member/info';</script>";
        }
        else
        {
            echo "<script>alert('添加失败');location.href='/web/member/info';</script>";
        }

    }
    /**
     *   展示,分页,搜索
     */
    public function actionInfo()
    {
        $u_gender = $this->get('u_gender');
        $u_name = $this->get('u_name');
        $where=[];
        !empty($u_gender) && $where[]='u_gender ='.$u_gender;
        !empty($u_name) && $where[]='u_name like'.'"%'.$u_name.'%"';
        if(!$where)
        {
            $where = '1=1'  ;
        }else{
            $where=implode(' and ',$where);
        }
        //var_dump($where);
        /*$data = \Yii::$app->db->createCommand("select * from user where('')")->queryAll();*/
        $db=User::find()->andwhere($where);
        $count=$db->count();
        $pages = new Pagination(['totalCount' =>$count,'pagesize'=>4]);
        $model=$db->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        return $this->render('info', ['pages'=>$pages,'data'=>$model,'count'=>$count,'num'=>count($model)]);
    }

    /**
     *   修改
     */
    public function actionSet(){
        $id=$this->get('u_id');
        //echo $u_id;die;
        $data = \Yii::$app->db->createCommand("select * from user where u_id = '$id'")->queryOne();
        return $this->render('set',['data'=>$data]);
    }
    public function actionSet_message()
    {

        //接受要修改的值
        $id = \Yii::$app->request->get('u_id');
        $u_name = \Yii::$app->request->post('u_name');
        $u_pwd = \Yii::$app->request->post('u_pwd');
        $u_tel = \Yii::$app->request->post('u_tel');
        $u_email = \Yii::$app->request->post('u_email');
        //执行修改
        $res = \Yii::$app->db->createCommand()->update('user', ['u_name'=>$u_name,'u_pwd'=>$u_pwd,'u_email'=>$u_email,'u_tel'=>$u_tel],["u_id" => $id])->execute();
        //判断是否修改成功
        if($res)
        {
            echo "<script>alert('修改成功');location.href='/web/member/info';</script>";
        }
        else
        {
            echo "<script>alert('修改失败');location.href='/web/member/set';</script>";
        }
    }
    /**
     *   删除
     */
    public function actionDelete()
    {
        //接受要删的ID
        $id = $this->get('u_id');
        //执行删除语句
        $rest = \Yii::$app->db->createCommand()->delete('user',"u_id = $id")->execute();
        //判断是否删除成功
        if($rest)
        {
            echo "<script>alert('删除成功');location.href='/web/member/info';</script>";
        }
        else
        {
            echo "<script>alert('删除失败');location.href='/web/member/info';</script>";
        }
    }

   /**
*   评论
*/
    /*  public function actionComment()
      {
          $db=User::find();
          $count=$db->count();
          $pages = new Pagination(['totalCount' =>$count,'pagesize'=>4]);
          $model=$db->offset($pages->offset)->limit($pages->limit)->asArray()->all();

          return $this->render('comment', ['pages'=>$pages,'data'=>$model,'count'=>$count,'num'=>count($model)]);
      }
      public function actionSetcomment()
      {
          $id = $this->get('u_id');
          return $this->render('setcomment',['u_id'=>$id]);
      }
      public function actionCritic()
      {
          $id = $this->post('u_id');
          $u_address = $this->post('u_address');
          $rest = new User();
          $common=$rest->findOne($id);
          $common->u_address=$u_address;
          $common-> save();
          if($common-> save())
          {
              echo "<script>alert('评论成功');location.href='/web/member/comment';</script>";
          }
          else
          {
              echo "<script>alert('评论失败');location.href='/web/member/setcomment';</script>";
          }
      }*/
    /**
    *   会员简历
     */
    public function actionResume()
    {
        $command = \Yii::$app->db->createCommand('select * from j_user inner join j_jianli on j_user.j_id = j_jianli.l_id')->queryOne();
        return $this->render('resume', ['command'=>$command]);
    }
    /**
     *   会员信息
     */public function actionInformation()
    {
        $u_id = $this->get('u_id');
        $rest = new User();
        $data = $rest->find()->where(" u_id = '$u_id'")->asArray()->one();
       // var_dump($data);die;
        return $this->render('information',['data'=>$data]);
    }
    public function actionJianli()
    {
        return $this->render('jianli');
    }
}