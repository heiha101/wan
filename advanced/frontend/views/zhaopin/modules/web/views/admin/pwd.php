
<?php
use \app\assets\WebAsset;
use \app\common\services\StaticService;
use \app\common\services\Urlservice;
StaticService::includeJs('js/web/admin/edit.js',WebAsset::className());
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>管理后台</title>
	<link href="/css/web/bootstrap.min.css" rel="stylesheet">
<link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="/css/web/style.css?ver=20170326180701" rel="stylesheet"></head>

<body>
<div id="wrapper">
		<div class="row  border-bottom">
	<div class="col-lg-12">
		<div class="tab_title">
			<ul class="nav nav-pills">
								<li  >
					<a href="/web/admin/edit">信息编辑</a>
				</li>
								<li  class="current"  >
					<a href="/web/admin/pwd">修改密码</a>
				</li>
							</ul>
		</div>
	</div>
</div><div class="row m-t  user_reset_pwd_wrap">
    <div class="col-lg-12">
        <h2 class="text-center">修改密码</h2>
        <div class="form-horizontal m-t m-b">
            <div class="form-group">
                <label class="col-lg-2 control-label">账号:</label>
                <div class="col-lg-10">
                    <label class="control-label"><?= $info['adm_name']?></label>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-lg-2 control-label">手机:</label>
                <div class="col-lg-10">
                    <label class="control-label"><?= $info['photo']?></label>
                </div>
            </div>
            <div class="hr-line-dashed"></div>

            <div class="form-group">
                <label class="col-lg-2 control-label">原密码:</label>
                <div class="col-lg-10">
                    <input type="password" id="adm_pwd" name="adm_pwd" class="form-control"  value="">
                </div>
            </div>
            <div class="hr-line-dashed"></div>

            <div class="form-group">
                <label class="col-lg-2 control-label">新密码:</label>
                <div class="col-lg-10">
                    <input type="password" id="new_pwd" name="new_pwd" class="form-control"  value="">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-lg-4 col-lg-offset-2">
                    <button class="btn btn-w-m btn-outline btn-primary" id="save">保存</button>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
</body>

<script>
    $('#save').on('click',function(){
        var adm_pwd = $('input[name=adm_pwd]').val();
        var new_pwd = $('input[name=new_pwd]').val();
        if(adm_pwd.length<3){
            alert('密码不能小于3位');
            return false;
        }
        $.ajax({
            url:'<?php echo Urlservice::buildwebUrl('/admin/pwddo')?>',
            type:'post',
            data:{
                'adm_pwd':adm_pwd,
                'new_pwd':new_pwd
            },
            success:function(msg){
                if(msg==1){
                    alert('密码不正确');
                    return false;
                }else{
                    alert('修改成功,请重新登录！');
                    location.href="<?php echo Urlservice::buildwebUrl('/default/index')?>";
                }
            }
        })
    })
</script>
</html>
