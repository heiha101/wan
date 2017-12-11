<?php
use yii\widgets\LinkPager;
?>
<div class="row  border-bottom">
    <div class="col-lg-12">
        <div class="tab_title">
            <ul class="nav nav-pills">
                <li  >
                    <a href="/web/member/info">会员中心</a>
                </li>
                <li  class="current" >
                    <a href="/web/member/resume">会员简历</a>
                </li>

                <li >
                    <a href="/web/member/information">会员信息</a>
                </li>
            </ul>
        </div>
    </div>
</div>
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
</form>

<div>
    <table class="table table-bordered m-t">
        <thead>
        <tr>
            <th>ID</th>
            <th>简历人</th>
            <th>手机号</th>
            <th>性别</th>
            <th>邮箱</th>
             <th>学历</th>
            <th>公司</th>
            <th>职位</th>
        </tr>
        </thead>
        <tbody>

            <tr>
                <td><?php echo $command['j_id']?></td>
                <td><?php echo $command['j_name']?></td>
                <td><?php echo $command['j_photo']?></td>
                <td><?php echo $command['j_sex']?></td>
                <td><?php echo $command['j_email']?></td>
                <td><?php echo $command['j_xueli']?></td>
                <td><?php echo $command['g_name']?></td>
                <td><?php echo $command['g_zhi']?></td>
            </tr>
        </tbody>
    </table>

</div>