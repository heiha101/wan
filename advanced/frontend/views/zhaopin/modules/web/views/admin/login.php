
<?php
use app\common\services\Urlservice;
?>

		<div class="col-md-6 text-center">
			<h2 class="font-bold">13直聘管理后台</h2>
			<p>
				<img src="<?= Urlservice::buildWwwUrl('/images/common/qrcode.jpg')?>" width="300px"/>
			</p>
            <p class="text-danger">
                扫描关注查看Demo
            </p>
		</div>
		<div class="col-md-6">
			<div class="ibox-content">
				<form class="m-t" role="form" action="<?= Urlservice::buildWebUrl('/admin/login')?>" method="post">
                    <div class="form-group text-center">
                        <h2 class="font-bold">登录</h2>
                    </div>
					<div class="form-group">
						<input type="text" name="adm_name" class="form-control" placeholder="请输入登录用户名">
					</div>
					<div class="form-group">
						<input type="password" name="adm_pwd" class="form-control" placeholder="请输入登录密码">
					</div>
					<button type="submit" class="btn btn-primary block full-width m-b">登录</button>
                    <h3>账号和密码请关注左侧服务号 回复"<span class="text-danger">商城账号</span>"获取，每日更新一次 </h3>
				</form>
			</div>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-6">
            图书商城管理系统 <a href="http://www.123.com/" target="_blank"> 技术支持 </a>
		</div>
		<div class="col-md-6 text-right">
			<small>© 2017</small>
		</div>
	</div>

