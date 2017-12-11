<div class="row  border-bottom">
    <div class="col-lg-12">
        <div class="tab_title">
            <ul class="nav nav-pills">
                <li  class="current"  >
                    <a href="/web/member/info">会员中心</a>
                </li>
           <!--     <li  >
                    <a href="/web/member/comment">会员评论</a>
                </li>-->
                <li >
                    <a href="/web/member/resume">会员简历</a>
                </li>
               <!-- <li >
                    <a href="/web/member/jianli">会员投放简历</a>
                </li>-->
                <li  >
                    <a href="/web/member/information">会员信息</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<form action="/web/member/index" method="post">
    <div class="row m-t  wrap_account_set">
        <div class="col-lg-12">
            <h2 class="text-center">添加账号</h2>
            <div class="form-horizontal m-t m-b">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">手机:</label>
                    <div class="col-lg-10">
                        <input type="text" name="u_tel" class="form-control" placeholder="请输入手机~~" >
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">邮箱:</label>
                    <div class="col-lg-10">
                        <input type="text" name="u_email" class="form-control" placeholder="请输入邮箱~~" >
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">登录名:</label>
                    <div class="col-lg-10">
                        <input type="text" name="u_name" class="form-control" autocomplete="off" placeholder="请输入登录名~~" >
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">登录密码:</label>
                    <div class="col-lg-10">
                        <input type="password" name="u_pwd" class="form-control"  autocomplete="new-password" placeholder="请输入登录密码~~">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

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