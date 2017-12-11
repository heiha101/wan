<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/16
 * Time: 10:09
 */

namespace app\modules\m\controllers;


use app\common\base\BaseController;
use app\models\CompanyInfo;
use app\models\Industy;
use app\models\Region;
use app\modules\m\controllers\common\MbaseController;
use yii\data\Pagination;
use Yii;
use app\models\File;
use yii\web\UploadedFile;

class CompanyController extends MbaseController{

    public function actionIndex()
    {
        //地区展示
        $region = new region();
        $res = $region->find()->asArray()->all();
        //行业展示
        $Industy = new Industy();
        $reg = $Industy->find()->asArray()->all();
//        var_dump($res);die;

        $data = CompanyInfo::find()->JoinWith(['region', 'equity'])->asArray()->select('*')->all(); //联查
        foreach ($data as $k => $v) {
            $ids=explode(',',$v['b_id']);
            foreach($ids as $key=>$val){
                $arr= Industy::find()->select('i_name')->where('i_id='.$val)->asArray()->one();
//                $str= company_boon::find->select('boon_name')->where('f_id=f_id')->asArray()->one();
                $data[$k]['i_name'][]=$arr['i_name'];
            }

        }
//        var_dump($data);die;
        return $this->render('index', [
            'data' => $data,
//            'pages' => $pages,
            'res' => $res,
            'reg' => $reg
        ]);
    }
//        var_dump($data);die;
//        $pages = new Pagination(['totalCount' =>$data->count(), 'pageSize' => '2']);
//        $model = $data->offset($pages->offset)->limit($pages->limit)->asArray()->all(); //分页
//        var_dump($data);die;
//        $a = $data[0]['f_name'];
//        $b = $data[0]['f_logo'];
//        $c = $data[0]
//        var_dump($data[0]['f_logo']);die;
//        $arr = array();
//        foreach ($data as $key => $value) {
//            $j = explode(',',$value['f_id']);
//            $a = explode(',',$value['f_name']);
//            $b = explode(',',$value['f_logo']);
//            $c = explode(',',$value['r_name']);
//            $d = explode(',',$value['e_stage']);
//            foreach ($value['i_name'] as $k => $v) {
//                $e[] = $v['i_name'];
//
//            }
////            var_dump($j);
////            die;
//            $arr[] = array_merge($j,$a,$b,$c,$d,$e);
//            }
//
//            var_dump($arr);die;
    /*
     分页
    */
    public function actionRegion(){

        return $this->render('subscribe');
    }
}