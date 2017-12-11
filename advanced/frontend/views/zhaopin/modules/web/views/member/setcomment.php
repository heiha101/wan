<div class="row  border-bottom">
    <div class="col-lg-12">
        <div class="tab_title">
            <ul class="nav nav-pills">
                <li  class="current"  >
                    <a href="/web/member/info">会员中心</a>
                </li>
             <!--   <li  >
                    <a href="/web/member/comment">会员评论</a>
                </li>-->
                <li  >
                    <a href="/web/member/resume">会员简历</a>
                </li>
              <!--  <li >
                    <a href="/web/member/jianli">会员投放简历</a>
                </li>-->
                <li >
                    <a href="/web/member/information">会员信息</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<form action="/web/member/critic" method="post">
    <div class="row m-t  wrap_account_set">
        <div class="col-lg-12">
            <h2 class="text-center">评论会员</h2>
            <div class="form-horizontal m-t m-b">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">评论用户ID:</label>
                    <div class="col-lg-10">
                        <input type="text" name="u_id" class="form-control" autocomplete="off" value="<?php echo $u_id;?>">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">评论内容:</label>
                    <div class="col-lg-10">
                        <textarea type="text" name="u_address" class="form-control"></textarea>
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