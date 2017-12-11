
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
								<li  class="current"  >
					<a href="/web/admin/edit">信息编辑</a>
				</li>
								<li  >
					<a href="/web/admin/pwd">修改密码</a>
				</li>
							</ul>
		</div>
	</div>
</div><div class="row m-t  user_edit_wrap">
    <div class="col-lg-12">
        <h2 class="text-center">账号信息编辑</h2>
        <div class="form-horizontal m-t m-b">
            <div class="form-group">
                <label class="col-lg-2 control-label">手机:</label>
                <div class="col-lg-10">
                    <input type="text" name="photo" class="form-control" placeholder="请输入手机~~"  value="<?= $info['photo']?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>

            <div class="form-group">
                <label class="col-lg-2 control-label">姓名:</label>
                <div class="col-lg-10">
                    <input type="text" name="nikename" class="form-control" placeholder="请输入姓名~~" value="<?= $info['nikename']?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>

            <div class="form-group">
                <label class="col-lg-2 control-label">邮箱:</label>
                <div class="col-lg-10">
                    <input type="text" name="email" class="form-control" placeholder="请输入邮箱~~" value="<?= $info['email']?>">
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-lg-4 col-lg-offset-2">
                    <button class="btn btn-w-m btn-outline btn-primary save">保存</button>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

<script src="/js/web/admin/edit.js"></script>
<script>
    $('.save').on('click',function(){
        var nikename = $('input[name=nikename]').val();
        var photo = $('input[name=photo]').val();
        var email = $('input[name=email]').val();

        if(photo.length!=11){
            alert('手机号格式错误');
            return false;
        }
       if(nikename.length<2){
           alert('姓名格式不正确！');
       }
        $.ajax({
            url:'<?php echo Urlservice::buildwebUrl('/admin/editdo')?>',
            type:'post',
            data:{
                'nikename':nikename,
                'photo':photo,
                'email':email
            },
            success:function(msg){
                if(msg==1){
                    alert('修改成功');
                    location.href="<?php echo Urlservice::buildwebUrl('/default/index')?>";
                }
            }
        })
    })
</script>
</body>
</html>


