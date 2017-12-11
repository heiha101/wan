<?php
use app\common\services\Urlservice;
?>
<div id="wrapper">
        <div class="row  border-bottom">
            <div class="col-lg-12">
                <div class="tab_title">
                    <ul class="nav nav-pills">
                        <li  class=""  >
                            <a href="<?= Urlservice::buildWebUrl('/company/index')?>">返回账户列表</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <form action="<?= Urlservice::buildWebUrl('/company/create_user')?>" method="post">
        <div class="row m-t  wrap_account_set">
            <div class="col-lg-12">
                <h2 class="text-center">添加账号</h2>
                <div class="form-horizontal m-t m-b">
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">手机:</label>
                        <div class="col-lg-10">
                            <input type="text" name="c_tel" class="form-control" placeholder="请输入手机~~" >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">邮箱:</label>
                        <div class="col-lg-10">
                            <input type="text" name="c_email" class="form-control" placeholder="请输入邮箱~~" >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">登录名:</label>
                        <div class="col-lg-10">
                            <input type="text" name="c_name" class="form-control" autocomplete="off" placeholder="请输入登录名~~" >
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">登录密码:</label>
                        <div class="col-lg-10">
                            <input type="password" name="c_pwd" class="form-control"  autocomplete="new-password" placeholder="请输入登录密码~~">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-2">
                            <input type="submit"  class="btn btn-w-m btn-outline btn-primary save" value="保存"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
