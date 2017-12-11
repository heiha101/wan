<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 19:48
 */

namespace app\modules\web\controllers;

use app\models\Logo;
use app\modules\web\controllers\common\BaseWebController;
use yii\web\Controller;

/**
 * Default controller for the `web` module
 */
class FinanceController extends BaseWebController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $logo=new Logo();
        $pagesize=3;
        $sort='id desc';
        if($this->isPost()){
            $p=$this->post('p');
            $serch=$this->post('serch');
            if($serch==-1){
                $where="";
            }else{
                $where="comp_status='$serch'";
            }
            $data= $this->actionPages($logo,$p,$pagesize,$where,$sort);
            echo json_encode($data);die;
            //return $this->render('index',['info'=>$data]);
        }
        $p=$this->get('p')?$this->get('p'):1;
        $where='';
        $info=$this->actionPages($logo,$p,$pagesize,$where,$sort);
        //var_dump($info);die;
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
    public function actionPay_info()
    {
        //根据接到的ID查询查询此条数据并渲染到前台页面
        $id=$this->get('id');
        $logo=new Logo();
        $logo_info=$logo->find()->where("id='$id'")->asArray()->one();
        return $this->render('account',['info'=>$logo_info]);

        //return $this->render('Account');pay_info
    }
    //修改状态
    public function actionSele(){
        $serch=$this->post('serch');
        //将获取到的值修改数据库
        $logo=new Logo();
        $logo->comp_status=$serch;
        $res=$logo->save();
        if($res){
            echo "1";
        }
    }
}