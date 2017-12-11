<?php

namespace app\modules\web\controllers;

use app\common\base\BaseController;
use app\models\JobCate;
use app\modules\web\controllers\common\BaseWebController;
use app\common\services\Urlservice;
use yii\web\Controller;

/**
 * Default controller for the `web` module
 */
class BrandController extends BaseWebController
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionInfo()
    {
        $cate = new JobCate();
        //查询
        $data = $cate->find()->asArray()->all();
        //调用递归查询
        $res=$this->getInfo($data);

        return $this->render('index',['res'=>$res]);
    }
   
    //分类添加
    public function actionCate_add(){

            $cate = new JobCate();

            if($this->isPost()){
                //接值post传过来的所有值
                $cate_name=\yii::$app->request->post('cate_name');
                $parent_id=\yii::$app->request->post('parent_id');
                $cate_sort=\yii::$app->request->post('cate_sort');
                //执行添加
                $cate->job_cate_name = $cate_name;
                $cate->parent_id = $parent_id;
                $cate->job_cate_sort = $cate_sort;
                $res=$cate->save();
                //判断
                if($res){
                    echo "<script>alert('添加成功');location.href='".Urlservice::buildWebUrl('/brand/info')."'</script>";
                }else{
                    echo "<script>alert('添加失败');location.href='".Urlservice::buildWebUrl('/brand/cate_add')."'</script>";
                };
            }
                //查询
                $data = JobCate::find()->asArray()->all();
                //调用递归查询
                $res=$this->getInfo($data);
                //向模板输值
                return $this->render('set',['res'=>$res]);

    }
    //递归无线级查询
    private function getInfo($info,$pid=0,$level=0){
        static $data=array();
        foreach ($info as $k=>$v) {
            if($v['parent_id']==$pid){
                $v['level']=$level;
                $data[]=$v;
                $this->getInfo($info,$v['job_cate_id'],$level+20);
            }
        }
        return $data;
    }
}
