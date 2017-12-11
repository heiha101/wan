<?php
/**
 * Created by PhpStorm.
 * User: 刘晓东
 * Date: 2017/9/14
 * Time: 15:55
 */

namespace app\modules\m\controllers;

use app\common\base\BaseController;
use app\common\services\Urlservice;
use app\models\Logo;
use app\models\UploadForm;
use yii\web\UploadedFile;
use \Yii\helpers\Html;

class LogoController extends BaseController{
    //跳转页面
    public function returnBackend_alert($msg,$path)
    {
        //@是指向谁的意思
        return $this->renderPartial("@app/modules/m/common/alert",['msg' => $msg,'path' => $path]);
    }
    public function actionIndex(){
        //如果登陆成功的就可以发送请求
        if($this->isPost()){
           //接受表单的数据并进行验证
            $name=$this->post('compny_name');
            if($name==''){
                return $this->returnBackend_alert('公司名称不能为空','/logo/index');
            }
            $compny_tel=$this->post('compny_tel');
            if($compny_tel==''){
                return $this->returnBackend_alert('公司预留电话不能为空','/logo/index');
            }
            $file=UploadedFile::getInstanceByName('file');
            //定义新的文件路径（获取文件的后缀并重命名，然后将临时文件移动到指定的文件夹下）
            $uplodas='images/m/';
            //新文件的命名
            $new_file=$uplodas.rand(0,9999).time().substr($file->name,strrpos($file->name,'.'));
            //echo $new_file;die;
            $compny_money=$this->post('compny_money');
            if($compny_money==''){
                return $this->returnBackend_alert('公司预留电话不能为空','/logo/index');
            }
            if(move_uploaded_file($file->tempName,$new_file)){
            //将得到的数据添加进入数据库
                $logo=new Logo();
                $logo->comp_name=Html::encode($name);
                $logo->comp_tel=Html::encode($compny_tel);
                $logo->comp_img=Html::encode($new_file);
                $logo->comp_money=Html::encode($compny_money);
                $time=date('m');
                $logo->comp_settime_month=Html::encode($time);
                $res=$logo->save();
                if($res){
                    return $this->returnBackend_alert('竞标成功请耐心等待','/logo/index');
                }
            }
        }
        return $this->renderPartial('index');
    }
}