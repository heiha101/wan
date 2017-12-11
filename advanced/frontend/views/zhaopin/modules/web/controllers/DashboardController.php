<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/3
 * Time: 19:48
 */

namespace app\modules\web\controllers;

use app\models\Company;
use app\models\Logo;
use app\models\User;
use app\modules\web\controllers\common\BaseWebController;
use yii\web\Controller;

/**
 * Default controller for the `web` module
 */
class DashboardController extends BaseWebController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        //新增会员数量(当天新增加的会员和近一周新增)
        $time=date('Y-m-d');
        $user=new User();
        $where1="create_time like '%$time%'";
        $user_day=$this->Count($user,$where1);
        /**获取一周内的新增加用户、
        1、获取当前的格式化的日期，只有年月日，再转化成时间戳，时间戳减去60*60*24*7，
        2、再将时间戳转化成格式化的日期，
        3、再用格式化的时间查询数据库区间 **/
        $week_time=strtotime($time);
        $week_times=$week_time-(60*60*24*7);
        //获取一周前的时间
        $week=date('Y-m-d',$week_times);
        $where2="create_time > '$week' and create_time < '$time'";
        $week_info=$this->Count($user,$where2);
        //获取公司用户在当日与一个月内的增长数量
        $company= new Company();
        $where_company="c_settime like '%$time%'";
        $comp_days=$this->Count($company,$where_company);
        $com_month=$week_time-(60*60*24*30);
        //获取一个月以前的时间
        $comp_month=date('Y-m-d',$com_month);
        $where_company_month="c_settime > '$comp_month' and c_settime < '$time'";
        $com_info_month=$this->Count($company,$where_company_month);
        //获取公司当日营业额与一个月内的营业额
        $comp_money=new Logo();
        $comp_money_day=\yii::$app->db->createCommand("select sum(comp_money) FROM logo WHERE(comp_settime like '%$time%' and comp_status=1)")->queryOne();
        if($comp_money_day==null){
            $comp_money_day=0;
        }
        $comp_money_month=\yii::$app->db->createCommand("select sum(comp_money) FROM logo WHERE(comp_settime > '$comp_month' and comp_settime < '$time' and comp_status=1)")->queryOne();
        //查询当日与一个月的订单总数量
        $count_where="comp_settime like '%$time%'";
        $comp_count=$this->Count($comp_money,$count_where);
        $count_month_where="comp_settime > '$week' and comp_settime < '$time' and comp_status=1";
        $comp_month_count=$this->Count($comp_money,$count_month_where);
        //var_dump($comp_month_count);
        $info=[
            'user_day'=>$user_day,//当日增长用户
            'week_info'=>$week_info,//一周内增长用户
            'comp_days'=>$comp_days,//当日增长公司用户
            'com_info_month'=>$com_info_month,//一个月内增长的公司用户
            'comp_money_day'=>$comp_money_day,//公司当日营业额
            'comp_money_month'=>$comp_money_month,//公司一个月的营业额
            'comp_count'=>$comp_count,//公司当日增加的订单数量
            'comp_month_count'=>$comp_month_count,//近一周内的订单总数量

        ];

        return $this->render('index',['info'=>$info]);
    }
    //封装的查询数据的方法
    public function Count($info,$where){
        return count($info->find()->where($where)->asArray()->all());
    }
}