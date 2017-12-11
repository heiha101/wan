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
    <form action="/web/admin/update" method="post" enctype="multipart/form-data">
        <div class="row mg-t20 wrap_book_set">
            <div class="col-lg-12">
                <h2 class="text-center">管理员设置</h2>
                <div class="form-horizontal m-t">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">管理员名称:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入管理员名称" name="login_name" value="<?= $list['adm_name']?>(不可改)">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">手机号:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入管理员手机号" name="photo" value="<?= $list['photo']?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">管理员头像:</label>
                        <div class="col-lg-10">

                            <div class="upload_wrap pull-left">
                                <i class="fa fa-upload fa-2x"></i>
                                <input type="hidden" name="bucket" value="book" />
                                <input type="file" name="img">
                            </div><img src="<?= $list['img']?>" width="100">

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
                                <?php  if($list['sex']==1){?>
                                    男&nbsp&nbsp<input type="radio" name="sex" value="1" checked>
                                    女&nbsp&nbsp<input type="radio" name="sex" value="2" >
                                    保密&nbsp&nbsp<input type="radio" name="sex" value="0">
                                <?php }?>

                                <?php  if($list['sex']==2){?>
                                    男&nbsp&nbsp<input type="radio" name="sex" value="1" >
                                    女&nbsp&nbsp<input type="radio" name="sex" value="2" checked>
                                    保密&nbsp&nbsp<input type="radio" name="sex" value="0">
                                <?php }?>

                                <?php  if($list['sex']==0){?>
                                    男&nbsp&nbsp<input type="radio" name="sex" value="1" >
                                    女&nbsp&nbsp<input type="radio" name="sex" value="2" >
                                    保密&nbsp&nbsp<input type="radio" name="sex" value="0" checked>
                                <?php }?>
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
                            <input type="text" class="form-control" name="email" placeholder="请输入管理员邮箱" value="<?= $list['email']?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">管理员昵称:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="nikename" placeholder="请输入管理员昵称" value="<?= $list['nikename']?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-2">
                            <input type="hidden" name="id" value="<?= $list['adm_id']?>">
                            <input type="submit" value="保存" class="btn btn-w-m btn-outline btn-primary save">
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
    //        var name=$(this).val();
    //        if(name==''){
    //            alert('姓名不能为空');
    //        }
    //    });
</script>























