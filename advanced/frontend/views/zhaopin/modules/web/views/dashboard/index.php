<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <link href="/css/web/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/web/style.css?ver=20170401" rel="stylesheet">
</head>

<body>
<div id="wrapper">
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">日统计</span>
                            <h5>营业额度</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins" style="color: green"><?php if($info['comp_money_day']['sum(comp_money)']==''){
                                    echo "0";
                                }else{
                                    echo $info['comp_money_day']['sum(comp_money)'];
                                } ?>元</h1>
                            <small>近30日：<?= $info['comp_money_month']['sum(comp_money)']?>元</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">日统计</span>
                            <h5>订单数量</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins" style="color: green"><?php echo $info['comp_count']?></h1>
                            <small>近一周总数：<?php echo $info['comp_month_count']?></small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">日统计</span>
                            <h5>新增会员</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins" style="color: green"><?php echo $info['user_day']?></h1>
                            <small>近一周新增：</small>
                            <small style="color: green">：<?php echo $info['week_info']?>个</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">日统计</span>
                            <h5>公司用户</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins" style="color: green"><?php echo $info['comp_days']?></h1>
                            <small>近30日增加：<?php echo $info['com_info_month']?>个</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" id="member_order" style="height: 400px;border: 1px solid #e6e6e6;padding-top: 20px;">

                </div>
                <div class="col-lg-12" id="finance" style="height: 400px;border: 1px solid #e6e6e6;padding-top: 20px;">

                </div>
            </div>
        </div>
</div>
</body>
</html>

