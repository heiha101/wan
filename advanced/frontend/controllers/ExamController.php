<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
//use yii\filters\VerbFilter;
//use yii\filters\AccessControl;
//use common\models\LoginForm;

/**
 * Exam controller
 */
class ExamController extends Controller
{
    public $enableCsrfValidation=false;
    public $layout=false;
    public function actionExam(){
        return $this->render("exam");
    }
    //添加新题
    public function actionInsert(){
        $data=$_POST;
        $data['duo_answer']=implode(",",$data['duo_answer']);
        $dan=array();
        $duo=array();
        $pan=array();
        foreach($data as $k=>$v)
        {
                if($k=="dan_title")
                {
                    $dan['title']=$v;
                }
                if($k=="dan_a")
                {
                    $dan['a']=$v;
                }
                if($k=="dan_b")
                {
                    $dan['b']=$v;
                }
                if($k=="dan_c")
                {
                    $dan['c']=$v;
                }
                if($k=="dan_d")
                {
                    $dan['d']=$v;
                }
                if($k=="dan_answer")
                {
                    $dan['answer']=$v;
                }
            if($k=="duo_title")
            {
                $duo['title']=$v;
            }
            if($k=="duo_a")
            {
                $duo['a']=$v;
            }
            if($k=="duo_b")
            {
                $duo['b']=$v;
            }
            if($k=="duo_c")
            {
                $duo['c']=$v;
            }
            if($k=="duo_d")
            {
                $duo['d']=$v;
            }
            if($k=="duo_answer")
            {
                $duo['answer']=$v;
            }
            if($k=="pan_title")
            {
                $pan['title']=$v;
            }
            if($k=="pan_a")
            {
                $pan['a']=$v;
            }
            if($k=="pan_b")
            {
                $pan['b']=$v;
            }
            if($k=="pan_c")
            {
                $pan['c']=$v;
            }
            if($k=="pan_d")
            {
                $pan['d']=$v;
            }
            if($k=="pan_answer")
            {
                $pan['answer']=$v;
            }
        }
        if($dan['title']!="")
        {
            $dan['type']="单选题";
            $dan['choose']=$duo['a'].'，'.$duo['b'].'，'.$duo['c'].'，'.$duo['d'];
            unset($dan["a"]);unset($dan["b"]);unset($dan["c"]);unset($dan["d"]);
            $res_dan=\Yii::$app->db->createCommand()->insert('exam',$dan)->execute();
        }
        if($duo['title']!="")
        {
            $duo['type']="多选题";
            $duo['choose']=$duo['a'].'，'.$duo['b'].'，'.$duo['c'].'，'.$duo['d'];
            unset($duo["a"]);unset($duo["b"]);unset($duo["c"]);unset($duo["d"]);
            $res_duo=\Yii::$app->db->createCommand()->insert('exam',$duo)->execute();
        }
        if($pan['title']!="")
        {
            $pan['type']="判断题";
            $pan['choose']="对，错";
            $res_pan=\Yii::$app->db->createCommand()->insert('exam',$pan)->execute();
        }
        if($res_dan>0&&$res_duo>0&&$res_pan>0)
        {
            echo "<script>alert('成功');location.href='?r=exam/show';</script>";
        }else
        {
            echo "<script>alert('失败');location.href='?r=exam/show';</script>";
        }

    }
    //展示录入的考题
    public function actionShow(){
        $data=\Yii::$app->db->createCommand("select * from exam")->queryAll();
        $dan=array();
        $duo=array();
        $pan=array();
//        var_dump($data);
        foreach($data as $k=>$v)
        {
            if($v['type']=="单选题")
            {
                $a=explode("，",$v['choose']);
                $d['A']=$a[0];
                $d['B']=$a[1];
                $d['C']=$a[2];
                $d['D']=$a[3];
                $d['title']=$v['title'];
                $d['type']=$v['type'];
                $d['answer']=$v['answer'];
                $d['title']=$v['title'];
                $d['id']=$v['id'];
                array_push($dan,$d);
            }
            if($v['type']=="多选题")
            {
                $a=explode("，",$v['choose']);
                $d['A']=$a[0];
                $d['B']=$a[1];
                $d['C']=$a[2];
                $d['D']=$a[3];
                $d['title']=$v['title'];
                $d['type']=$v['type'];
                $d['answer']=$v['answer'];
                $d['title']=$v['title'];
                $d['id']=$v['id'];
                array_push($duo,$d);
            }
            if($v['type']=="判断题")
            {
                $pan[]=$v;
            }
        }
        $root=$_SERVER["DOCUMENT_ROOT"];
        $path=$root."/nine/zhoukao2/exam_html/".date("Ym").'/'.date('d');
        if(!is_dir($path))
        {
            mkdir($path,0777,true);
        }
        $path1=$path.'/'.'exam'.time().'.html';
        $data=$this->render("show",['dan'=>$dan,'duo'=>$duo,'pan'=>$pan,'id'=>$path1],true);
        $arr=fopen($path1,'w+');
        fwrite($arr,$data);
        require_once($path1);
    }
    //提交试卷
    public function actionAnswer()
    {
        $data = $_POST;
        $count = count($data);
        $arr = array();
        $i = 0;
        foreach ($data as $k => $v) {
//            var_dump(substr($k,0,3));
            $id = substr($k, 3);
            if (is_array($v)) {
                $v = implode("，", $v);
            }
            $err = array(
                $id => $v
            );
            array_push($arr, $err);
        }
        $cuo_id="";
        $cuo_answer="";
        foreach ($arr as $k => $v) {
            foreach ($v as $key => $val) {
                $answer = \Yii::$app->db->createCommand("select * from exam where id=$key")->queryOne();
//                var_dump($answer);
                if ($answer['answer']==$val) {
                    $i++;
                } else {
                    $cuo_id.=$answer['id'].",";
                    $cuo_answer.=$val.",";
                }
            }
        }
        $cuo_id=rtrim($cuo_id,",");
        $cuo_answer=rtrim($cuo_answer,",");

        return $this->render("num", ['num' => $i * 5, 'sum' => $count * 5,'cuo_answer'=>$cuo_answer,'cuo_id'=>$cuo_id]);
    }
    //历史试卷
    public function actionHistory(){
        $cuo_answer=$_GET['cuo_answer'];
        $cuo_id=$_GET['cuo_id'];
        $id=$cuo_id;
        $cuo_id=explode(",",$cuo_id);
        $cuo_answer=explode(",",$cuo_answer);
        $err=array();
        foreach($cuo_id as $k=>$v)
        {
            foreach($cuo_answer as $key=>$val)
            {
                if($k==$key)
                {
                    $arr=array($v=>$val);
                    $err[]=$arr;
                }
            }

        }
        $data=\Yii::$app->db->createCommand("select * from exam")->queryAll();
        foreach($err as $k=>$v)
        {
            foreach ($v as $key=>$val) {
                foreach($data as $kk=>$vv){
                    if($vv['id']==$key)
                    {
                        $vv['answer']=$val;
                    }
                }
            }


        }print_r($data);
        $dan=array();
        $duo=array();
        $pan=array();
//        var_dump($data);
        foreach($data as $k=>$v)
        {
            if($v['type']=="单选题")
            {
                $a=explode("，",$v['choose']);
                $d['A']=$a[0];
                $d['B']=$a[1];
                $d['C']=$a[2];
                $d['D']=$a[3];
                $d['title']=$v['title'];
                $d['type']=$v['type'];
                $d['answer']=$v['answer'];
                $d['title']=$v['title'];
                $d['id']=$v['id'];
                array_push($dan,$d);
            }
            if($v['type']=="多选题")
            {
                $a=explode("，",$v['choose']);
                $d['A']=$a[0];
                $d['B']=$a[1];
                $d['C']=$a[2];
                $d['D']=$a[3];
                $d['title']=$v['title'];
                $d['type']=$v['type'];
                $d['answer']=$v['answer'];
                $d['title']=$v['title'];
                $d['id']=$v['id'];
                array_push($duo,$d);
            }
            if($v['type']=="判断题")
            {
                $pan[]=$v;
            }
        }

        return $this->render("history",['dan'=>$dan,'duo'=>$duo,'pan'=>$pan,'cuo_id'=>$id]);

    }

}
