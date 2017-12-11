<?php
use yii\widgets\LinkPager;
use app\common\services\Urlservice;
?>
<div class="row  border-bottom">
    <div class="col-lg-12">
        <div class="tab_title">
            <ul class="nav nav-pills">
                <li  class="current"  >
                    <a href="/web/member/info">会员中心</a>
                </li>
              <!--  <li  >
                    <a href="/web/member/comment">会员评论</a>
                </li>-->
                <li>
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
<div class="row">
    <div class="col-lg-12">
        <form class="form-inline wrap_search" action="">
            <div class="row m-t p-w-m">
                <div class="form-group">
                    <select name="status" id="status" class="form-control inline">
                        <option value="">性别</option>
                        <option value="1"  >男</option>
                        <option value="2"  >女</option>
                    </select>

                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="mix_kw" id="mix_kw" placeholder="公司名称或者邮箱" class="form-control" value="">
                        <!--分页隐藏域-->
						<span class="input-group-btn">
                            <button type="submit" class="btn btn-primary search">
                                <i class="fa fa-search"></i>搜索
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-w-m btn-outline btn-primary pull-right" href="/web/member/add">
                        <i class="fa fa-plus"></i>账号
                    </a>
                </div>
            </div>
        </form>
        <form action="/web/member/set_message?u_id=<?php echo $data['u_id'];?>" method="post">
            <div class="row m-t  wrap_account_set">
                <div class="col-lg-12">
                    <h2 class="text-center">修改账号</h2>
                    <input type="hidden" name="id" value="<?php echo $data['u_id'];?>"/>
                    <div class="form-horizontal m-t m-b">
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">手机:</label>
                            <div class="col-lg-10">
                                <input type="text" name="u_tel" class="form-control" value="<?php echo $data['u_tel']?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">邮箱:</label>
                            <div class="col-lg-10">
                                <input type="text" name="u_email" class="form-control" value="<?php echo $data['u_email']?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">登录名:</label>
                            <div class="col-lg-10">
                                <input type="text" name="u_name" class="form-control" autocomplete="off" value="<?php echo $data['u_name']?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">登录密码:</label>
                            <div class="col-lg-10">
                                <input type="password" name="u_pwd" class="form-control"  autocomplete="new-password" value="<?php echo $data['u_pwd']?>">
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
        <div class="row">
           <!-- <div class="col-lg-12">
                <span class="pagination_count" style="line-height: 40px;">共条<?/*= $count*/?>记录 |当前页<?/*= $num*/?>条</span>
                <ul class="pagination pagination-lg pull-right" style="margin: 0 0 ;">
                    <li class="active"><?php /*echo LinkPager::widget(['pagination' => $pages]);*/?></li>
                </ul>

            </div>-->
        </div>	</div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/web/company_sub.js"></script>
