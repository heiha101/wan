<?php
\app\common\services\StaticServer::jsAssets('/js/web/stat/product.js');
\app\common\services\StaticServer::jsAssets('/assets/My97DatePicker/WdatePicker.js');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <link href="/css/web/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/web/style.css?ver=20170401" rel="stylesheet">
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
</head>

<body>
<div id="wrapper">
    <div class="row  border-bottom">
        <div class="col-lg-12">
            <div class="tab_title">
                <ul class="nav nav-pills">
                    <li>
                        <a href="/web/stat/index">新增会员</a>
                    </li>
                    <li  class="current">
                        <a href="/web/stat/product">新增公司用户</a>
                    </li>
                    <li  >
                        <a href="/web/stat/member">销售额统计</a>
                    </li>
                </ul>
            </div>
        </div>
    </div><div class="row m-t">
        <div class="col-lg-12 m-t">
            <form class="form-inline" id="search_form_wrap">
                <div class="row p-w-m">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" placeholder="请选择开始时间" name="date_from" class="form-control" id="start_time" value="" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd HH:mm:ss'})">
                        </div>
                    </div>
                    <div class="form-group m-r m-l">
                        <label>至</label>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" placeholder="请选择结束时间" name="date_to" class="form-control" value="" id="end_time" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy-MM-dd HH:mm:ss'})">
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-w-m btn-outline btn-primary search" id="select">搜索</a>
                    </div>
                </div>
                <hr/>
            </form>
            <table class="table table-bordered m-t">
                <thead>
                <tr>
                    <th>公司名称</th>
                    <th>预留电话</th>
                    <th>公司地址</th>
                    <th>公司邮箱</th>
                    <th>注册时间</th>
                </tr>
                </thead>
                <tbody class="fen">
                <?php foreach($info['info'] as $k=>$v){ ?>
                    <tr>
                        <td><?=$v['c_name']?></td>
                        <td><?=$v['c_tel']?></td>
                        <td><?=$v['c_salf']?></td>
                        <td><?=$v['c_email']?></td>
                        <td><?=$v['c_settime']?></td>
                    </tr>
                <?php }?>
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
