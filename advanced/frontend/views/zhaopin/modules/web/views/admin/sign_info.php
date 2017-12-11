<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <link href="/css/web/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/web/style.css?ver=20170401" rel="stylesheet"></head>

<body>
<div class="row  border-bottom">
</div><style type="text/css">
    .wrap_info img{
        width: 70%;
    }
</style>
<div class="row m-t wrap_info">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="m-b-md">
                    <a class="btn btn-outline btn-primary pull-right" href="/web/admin/sign?id=<?= $list['adm_id']?>">
                        <i class="fa fa-pencil"></i>签到
                    </a>
                    <h2>管理员信息</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <p class="m-t">管理员名称：<?= $list['adm_name']?></p>
                <p>手机号：<?= $list['photo']?></p>
                <p>邮箱：<?= $list['email']?></p>
                <p>性别：<?php echo $list['sex']==1 ? '男' : '女'?></p>
                <p>用户头像：<img src="<?= $list['img']?>" style="width: 100px;height: 100px;"/> </p>
                <p>昵称：<?= $list['nikename']?> </p>
            </div>
        </div>
