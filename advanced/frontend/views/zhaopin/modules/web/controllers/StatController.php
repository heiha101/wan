<?php
/**
 * Created by PhpStorm.
 * User: 张治国
 * Date: 2017/9/3
 * Time: 20:51
 */

namespace app\modules\web\controllers;


use app\models\Admin;
use app\models\Logo;
use app\models\User;
use app\modules\web\controllers\common\BaseWebController;
use app\models\Company;

class StatController extends BaseWebController
{
   public function actionIndex()
   {
       $admin=new User();
       $pagesize=2;
       $sort='u_id desc';
       if($this->isAjax()){
           //根据时间区间来查询数据
           $start_time= $this->post('start_time');
           $end_time= $this->post('end_time');
           $p=$this->post('p');
           if($start_time=='' || $end_time==''){
               $where='1=1';
           }else{
               $where="create_time>'$start_time' and create_time<'$end_time'";
           }
           $data= $this->actionPages($admin,$p,$pagesize,$where,$sort);
           return json_encode($data);
       }
       //直接请求url时查询数据库的数据并将数据渲染都视图层
       //定义当前页
       $p=$this->get('p')?$this->get('p'):1;
       $where='';
       $info=$this->actionPages($admin,$p,$pagesize,$where,$sort);
       return $this->render('index',['info'=>$info]);
   }
    //接受时间插件传来的值，并进行查询(分页的方法)
    public function actionPages($admin,$p,$pagesize,$where,$sort){
        //查询总页数
        $count=$admin->find()->where("$where")->count();
        $total_page=ceil($count/$pagesize);
        //偏移量
        $offset=($p-1)*$pagesize;
        //上一页
        $lastPage=$p-1<1?1:$p-1;
        //下一页
        $nextPage=$p+1>$total_page?$total_page:$p+1;
        //分页的数据
        $info=$admin->find()->where("$where")
            ->orderBy("$sort")
            ->offset($offset)
            ->limit($pagesize)
            ->asArray()
            ->all();
        //返回更新后的页码
        $pages=[
            'lastPage'=>$lastPage,
            'nextPage'=>$nextPage,
            'total_page'=>$total_page,
            'p'        =>$p,
            'pagesize'=>$pagesize,

        ];
        $data=[
            'info'=>$info,
            'pages'=>$pages
        ];
        return $data;
    }

   public function actionProduct()
   {
       $admin=new Company();
       $pagesize=2;
       $sort='c_id desc';
       if($this->isAjax()){
           $start_time= $this->post('start_time');
           $end_time= $this->post('end_time');
           $p=$this->post('p');
           if($start_time=='' || $end_time==''){
               $where='1=1';
           }else{
               $where="c_settime>'$start_time' and c_settime<'$end_time'";
           }
           $data= $this->actionPages($admin,$p,$pagesize,$where,$sort);
           return json_encode($data);
       }
       $p=$this->get('p')?$this->get('p'):1;
       $where='';
       $info=$this->actionPages($admin,$p,$pagesize,$where,$sort);
       return $this->render('product',['info'=>$info]);
   }

    public function actionMember()
    {
        if($this->isPost()){
            //根据传输过来的时间区间查询相应的数据并以json形式发送到视图层
            $start_time= $this->post('start_time');
            $end_time= $this->post('end_time');
           for($i=1;$i<=12;$i++){
               $logo=\yii::$app->db->createCommand("select sum(comp_money) FROM logo WHERE(comp_settime_month='$i' and comp_settime like '%$start_time%' and comp_status=1)")->queryOne();
               if($logo==''){
                   $logo=3;
               }
               $info[]=$logo;
           }
            foreach($info as $k=>$v){
                $res[]=$v['sum(comp_money)'];
            }
            //var_dump($res);die;
            return json_encode($res);
        }
        return $this->render('member');
    }

    public function actionShare()
    {
        return $this->render('share');
    }


}