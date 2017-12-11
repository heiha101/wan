<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/14 0014
 * Time: 20:56
 */

namespace app\modules\m\controllers;

use app\modules\m\controllers\common\MbaseController;
use app\models\Postion;
use app\models\J_jianli;
use app\models\J_User;
use yii\data\Pagination;
class CreateController extends MbaseController
{
    public $enableCsrfValidation=false;
    public $layout= 'main';

   public function actionIndex()
   {
       return $this->render('index');
   }
    //添加职位
   public function actionGet()
   {  // echo 11;die;
       $data = \Yii::$app->request->post();
       $rest = new Postion();
       $rest->postion = $data['positionType'];
       $rest->postion_name = $data['positionname'];
       $rest->sector = $data['department'];
       $rest->nature = $data['jobNature'];
       $rest->range = $data['salaryMin'];
       $rest->background = $data['salaryMax'];
       $rest->requirements = $data['workYear'];
       $rest->temptation = $data['education'];
       $rest->address = $data['positionAdvantage'];
       $info = $rest->save();
       if($info)
       {
           echo "<script>alert('发布成功');location.href='/m/create/positions';</script>";
       }
       else
       {
           echo "<script>alert('发布失败');location.href='/m/create/index';</script>";
       }
   }

    //有效职位
    public function  actionPositions()
    {
        $db=Postion::find();
        $count=$db->count();
        $pages = new Pagination(['totalCount' =>$count,'pagesize'=>4]);
        $command=$db->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        return $this->render('positions', ['pages'=>$pages,'command'=>$command,'count'=>$count,'num'=>count($command)]);
    }
    //有效职位的编辑
    public function actionCreate()
    {
        return $this->render('create');
    }
    //有效职位的删除
    public function actionDelete()
    {
       $id = $this->get('id');
        //执行删除语句
        $rest = \Yii::$app->db->createCommand()->delete('postion',"postion_id = $id")->execute();
        //判断是否删除成功
        if($rest)
        {
            echo "<script>alert('删除成功');location.href='/m/create/positions';</script>";
        }
        else
        {
            echo "<script>alert('删除失败');location.href='/m/create/positions';</script>";
        }
    }
    //已下线职位
    public function actionPostion()
    {
        return $this->render('postion');
    }
    //待处理简历
    public function actionPending()
    {
        $command = \Yii::$app->db->createCommand('select * from j_user inner join j_jianli on j_user.j_id = j_jianli.l_id')->queryOne();
        return $this->render('pending', ['command'=>$command]);
    }

    //详细简历
    public function actionDetailed()
    {
        $id = $this->get('id');
        
        return $this->render('detailed');
    }

    //待定简历
    public function actionHave()
    {
        $command = \Yii::$app->db->createCommand('select * from j_user inner join j_jianli on j_user.j_id = j_jianli.l_id')->queryOne();
        return $this->render('have', ['command'=>$command]);
    }
    //已通知面试简历
    public function actionNotice()
    {
        $command = \Yii::$app->db->createCommand('select * from j_user inner join j_jianli on j_user.j_id = j_jianli.l_id')->queryOne();
        return $this->render('notice', ['command'=>$command]);
    }
    //不适合简历
    public function actionRefuse()
    {
        $command = \Yii::$app->db->createCommand('select * from j_user inner join j_jianli on j_user.j_id = j_jianli.l_id')->queryOne();
        return $this->render('refuse', ['command'=>$command]);
    }

    //自动过滤简历
    public function actionAuto()
    {
        $command = \Yii::$app->db->createCommand('select * from j_user inner join j_jianli on j_user.j_id = j_jianli.l_id')->queryOne();
        return $this->render('auto', ['command'=>$command]);
    }
}