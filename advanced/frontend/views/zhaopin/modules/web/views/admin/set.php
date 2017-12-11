<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<!--<head>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <title>管理后台</title>-->
<!--    <link href="/css/web/bootstrap.min.css" rel="stylesheet">-->
<!--    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">-->
<!--    <link href="/css/web/style.css?ver=20170401" rel="stylesheet">-->
<!--    <link href="/plugins/tagsinput/jquery.tagsinput.min.css?ver=20170401" rel="stylesheet">-->
<!--    <link href="/plugins/select2/select2.min.css?ver=20170401" rel="stylesheet"></head>-->

<body>
<div id="wrapper">
<form action="/web/admin/set" method="post" enctype="multipart/form-data">
    <div class="row mg-t20 wrap_book_set">
            <div class="col-lg-12">
                <h2 class="text-center">管理员设置</h2>
                <div class="form-horizontal m-t">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">管理员名称:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入管理员名称(这个不可改)" name="login_name" value="">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">管理员密码:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入管理员密码" name="login_pwd" value="">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">手机号:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入管理员手机号" name="photo" value="">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">管理员头像:</label>
                        <div class="col-lg-10">

                                <div class="upload_wrap pull-left">
                                    <i class="fa fa-upload fa-2x"></i>
                                    <input type="hidden" name="bucket" value="book" />
                                    <input type="file" name="img" accept="image/png, image/jpeg, image/jpg,image/gif">
                                </div>

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">性别:</label>
                        <div class="col-lg-2">
                            <div class="input-group">
                                <div class="input-group-addon hidden">
                                    <a class="disabled" href="javascript:void(0);">
                                        <i class="fa fa-minus"></i>
                                    </a>
                                </div>
                                男&nbsp&nbsp<input type="radio" name="sex" value="1">
                                女&nbsp&nbsp<input type="radio" name="sex" value="2">
                                <div class="input-group-addon hidden">
                                    <a href="javascript:void(0);">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">管理员邮箱:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="email" placeholder="请输入管理员邮箱">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">管理员昵称:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nikename" placeholder="请输入管理员昵称">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-2">
                            <input type="hidden" name="id" value="0">
                            <input type="submit" value="保存" class="btn btn-w-m btn-outline btn-primary save" id="sub">
<!--                            <button class="btn btn-w-m btn-outline btn-primary save">保存</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
</div>
</body>
</html>

<script src="/js/jq.js"></script>

<script>
//    $(document).on('blur','input[name=login_name]',function(){
//        $.ajax({
//            url: '/web/admin/one',
//            type: 'get',
//            data: {name:name},
//            dataType: 'json',
//            success:function(mas){
//                if(mas==1){
//                    alert('该用户已经注册过了');return false;
//                }
//            }
//        })
//    });
//    $(document).on('blur','input[name=login_pwd]',function(){
//        var name=$(this).val();
//        if(name==''){
//            alert('密码不能为空');return false;
//        }
//    });
//    $(document).on('blur','input[name=photo]',function(){
//        var name=$(this).val();
//        if(name==''){
//            alert('手机号不能为空');return false;
//        }
//    });
//    $(document).on('blur','input[name=email]',function(){
//        var name=$(this).val();
//        if(name==''){
//            alert('邮箱不能为空');return false;
//        }
//    });
//    $(document).on('blur','input[name=nikename]',function(){
//        var name=$(this).val();
//        if(name==''){
//            alert('昵称不能为空');return false;
//        }
//    });
    $(document).on('click','#sub',function(){
        var name=$('input[name=login_name]').val();
        if(name==''){
            alert('姓名不能为空');location.href='/web/admin/set';return false;
        }
        $.ajax({
            url: '/web/admin/one',
            type: 'get',
            data: {name:name},
            dataType: 'json',
            success:function(mas){
                if(mas==1){
                    alert('该用户已经注册过了');location.href='/web/admin/set';return false;
                }
            }
        });
        var pwd=$('input[name=login_pwd]').val();
        if(pwd==''){
            alert('密码不能为空');location.href='/web/admin/set';return false;
        }

        var photo=$('input[name=photo]').val();
        if(photo==''){
            alert('手机号不能为空');location.href='/web/admin/set';return false;
        }
        var email=$('input[name=email]').val();
        if(email==''){
            alert('邮箱不能为空');location.href='/web/admin/set';return false;
        }

        var name=$('input[name=nikename]').val();
        if(name==''){
            alert('昵称不能为空');location.href='/web/admin/set';return false;
        }

    });
</script>























