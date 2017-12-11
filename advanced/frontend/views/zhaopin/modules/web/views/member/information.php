<?php
use yii\widgets\LinkPager;
?>

<body>
<div id="wrapper">
    <div class="row  border-bottom">
        <div class="col-lg-12">
            <div class="tab_title">
                <ul class="nav nav-pills">
                    <li  >
                        <a href="/web/member/info">会员中心</a>
                    </li>
                 <!--   <li>
                        <a href="/web/member/comment">会员评论</a>
                    </li>-->
                    <li >
                        <a href="/web/member/resume">会员简历</a>
                    </li>
                   <!-- <li >
                        <a href="/web/member/jianli">会员投放简历</a>
                    </li>-->
                    <li class="current" >
                        <a href="/web/member/information">会员信息</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <form class="form-inline wrap_search" action="info">
                <div class="row  m-t p-w-m">
                    <div class="form-group">
                        <select name="u_gender" class="form-control inline">
                            <option value="">性别</option>
                            <option value="1"  >男</option>
                            <option value="2"  >女</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" name="u_name" placeholder="请输入关键字" class="form-control" value="">
                        <span class="input-group-btn">
                            <button type="submit" class="btn  btn-primary search">
                                <i class="fa fa-search"></i>搜索
                            </button>
                        </span>
                        </div>
                    </div>
                </div>
                <hr/>
            </form>

        </div>
    </div>

    <div class="col-lg-12" style="width:300px;height:260px">

        <tr>
                <th>ID</th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td><?php echo $data['u_id']?></td><br>

                <th>用户名</th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td><?php echo $data['u_name']?></td><br>
                <th>手机号</th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td><?php echo $data['u_tel']?></td><br>
                <th>性别</th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td><?php echo $data['u_gender']=='1' ? '男' : '女';?></td><br>
                <th>邮箱</th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <td><?php echo $data['u_email']?></td><br>
                <th>状态</th> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <td> <td>
                <?php if($data['u_state']==0){
                    echo "通过";
                }else if($data['u_state']==1){
                    echo "驳回";
                }else if($data['u_state']==2){
                    echo "已审核";
                }?>
            </td>
                </td>
                <br>


        </tr>
    </div>
    <!--<div class="row">
        <div class="col-lg-12">
            <span class="pagination_count" style="line-height: 40px;">共条<?/*= $count*/?>记录 |当前页<?/*= $num*/?>条</span>
            <ul class="pagination pagination-lg pull-right" style="margin: 0 0 ;">
                <li class="active"><?php /*echo LinkPager::widget(['pagination' => $pages]);*/?></li>
            </ul>

        </div>
    </div>	</div>-->