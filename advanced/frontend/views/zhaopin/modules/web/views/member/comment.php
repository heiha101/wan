<?php
use yii\widgets\LinkPager;
?>
<body>
<div id="wrapper">
        <div class="row  border-bottom">
            <div class="col-lg-12">
                <div class="tab_title">
                    <ul class="nav nav-pills">
                        <li >
                            <a href="/web/member/info">会员中心</a>
                        </li>
                    <!--    <li class="current" >
                            <a href="/web/member/comment">会员评论</a>
                        </li>-->
                        <li >
                            <a href="/web/member/resume">会员简历</a>
                        </li>
                      <!--  <li  >
                            <a href="/web/member/jianli">会员投放简历</a>
                        </li>-->
                        <li>
                            <a href="/web/member/information">会员信息</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered m-t">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>手机号</th>
                    <th>性别</th>
                    <th>邮箱</th>
                    <th>评论</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $v ) { ?>
                    <tr>
                        <td><?php echo $v['u_id']?></td>
                        <td><?php echo $v['u_name']?></td>
                        <td><?php echo $v['u_tel']?></td>
                        <td><?php echo $v['u_gender']=='1' ? '男' : '女';?></td>
                        <td><?php echo $v['u_email']?></td>
                        <td><?php echo $v['u_comment']?></td>
                        <td>
                            <a class="m-l remove" href="/web/member/delete?u_id=<?php echo $v['u_id'];?>" data="1">
                                <i class="fa fa-trash fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-lg-12">
                    <span class="pagination_count" style="line-height: 40px;">共条<?= $count?>记录 |当前页<?= $num?>条</span>
                    <ul class="pagination pagination-lg pull-right" style="margin: 0 0 ;">
                        <li class="active"><?php echo LinkPager::widget(['pagination' => $pages]);?></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
