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
											<a class="btn btn-outline btn-primary pull-right" href="/web/admin/update?id=<?= $list['adm_id']?>">
							<i class="fa fa-pencil"></i>编辑
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
        <div class="row m-t">
            <div class="col-lg-12">
                <div class="panel blank-panel">
                    <div class="panel-heading">
                        <div class="panel-options">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab-1" data-toggle="tab" aria-expanded="false">登录历史</a>
                                </li>
                                <li>
                                    <a href="#tab-2" data-toggle="tab" aria-expanded="true">历史更改</a>
                                </li>
                            </ul>
                        </div>
                    </div>
<?php
  $command = \Yii::$app->db->createCommand('select * from login_time')->queryAll();
  $list = \Yii::$app->db->createCommand('select * from login_update')->queryAll();
?>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-1">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>登录名称</th>
                                        <th>手机号</th>
                                        <th>登陆时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($command as $key => $v):?>
                                    <tr>
                                                <td><?= $v['login_name']?></td>
                                                <td><?= $v['photo']?></td>
                                                <td><?= $v['login_time']?></td>
                                    </tr>
                                     <?php endforeach?>
																			                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane" id="tab-2">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>登录名</th>
                                        <th>昵称</th>
                                        <th>时间</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($list as $key => $val):?>
                                    <tr>
                                                    <td><?= $val['login_name']?></td>
                                                    <td><?= $val['login_nikename']?></td>
                                                    <td><?= $val['login_update_time']?></td>
                                    </tr>
                                    <?php endforeach?>
                                                                                                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
	</div>
</div>

	</div>
</div>
</body>
</html>
