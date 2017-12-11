<?php
\app\common\services\StaticServer::jsAssets('/js/web/finance/logo.js');
?>
<style>
    .p{
        background-color: #98C04B;
        border-spacing: inherit;
        -moz-border-radius:6px;
        -ms-border-radius:6px;
        -o-border-radius:6px;
        -webkit-border-radius:6px;
        border-radius:6px!important;
        border: 1px #98C04B;
    }
</style>
<body>
<div id="wrapper">
        <div class="row  border-bottom">
            <div class="col-lg-12">
                <div class="tab_title">
                    <ul class="nav nav-pills">
                        <li  class="current"  >
                            <a href="/web/finance/index">订单列表</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-inline wrap_search">
                    <div class="row  m-t p-w-m">
                        <div class="form-group">
                            <select id="status" class="form-control inline">
                                <option value="-1">请选择状态</option>
                                <option value="0"  >待审核</option>
                                <option value="1"  >已通过</option>
                                <option value="2"  >已驳回</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-w-m btn-outline btn-primary search" id="select">搜索</a>
                        </div>
                    </div>

                </form>
                <hr/>
                <table class="table table-bordered m-t">
                    <thead>
                    <tr>
                        <th>公司ID</th>
                        <th>公司名称</th>
                        <th>预留电话</th>
                        <th>上传的广告</th>
                        <th>投注金额(￥)</th>
                        <th>审核状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="tb">
                    <?php foreach($info['info'] as $k=>$v){?>
                    <tr>
                        <td><?php echo $v['comp_id']?></td>
                        <td><?php echo $v['comp_name']?></td>
                        <td><?php echo $v['comp_tel']?></td>
                        <td><img src="http://www.13zp.com/<?= $v['comp_img']?>" alt="" style="width: 90px;height: 60px"/></td>
                        <td>￥<?php echo $v['comp_money']?></td>
                        <td><select name="status" id="sele" class="status">
                                <option value="0" <?php if($v['comp_status']==0){
                                    echo "selected";
                                }?>>待审核</option>
                                <option value="1" <?php if($v['comp_status']==1){
                                    echo "selected";
                                }?>>已通过</option>
                                <option value="2" <?php if($v['comp_status']==2){
                                    echo "selected";
                                }?>>已驳回</option>
                            </select>
                        </td>
                        <td>
                            <a class="m-l" href="/web/finance/pay_info?id=<?php echo $v['id']?>">
                                <i class="fa fa-eye fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-lg-12">
                        <span class="pagination_count" style="line-height: 40px;">共<span id="total"><?php echo $info['pages']['total_page']?></span>页记录 | 每页<?php echo $info['pages']['pagesize']?>条</span>
                        &nbsp;&nbsp;&nbsp;当前是第<span id="p"><?php echo $info['pages']['p']?></span>页
                        <center>
                            <div id="pa">
                                <button class="p" value="1">首页</button>
                                <button class="p" value="<?php echo $info['pages']['p']*1-1?>">上一页</button>
                                <button class="p" value="<?php echo $info['pages']['p']*1+1?>">下一页</button>
                                <button class="p" value="<?php echo $info['pages']['total_page']?>">尾页</button>
                            </div>
                            </center>
                        <ul class="pagination pagination-lg pull-right" style="margin: 0 0 ;">
                            <li class="active"><a href="javascript:void(0);">1</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
</html>
