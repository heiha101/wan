`<?php
use app\common\services\Urlservice;
use yii\web\AssetBundle;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理员后台</title>
    <link href="/css/web/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/web/style.css?ver=20170401" rel="stylesheet">
    <style>
        #p{
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
                        <li  class="current"  >
                            <a href="/web/admin/index">管理员管理</a>
                        </li>

                        <li  class=""  >
                            <a href="/web/admin/sign_info">管理员签到</a>
                        </li>

                        <li  class=""  >
                            <a href="/web/admin/set">添加管理员</a>
                        </li>

                        <li  class=""  >
                            <a href="/web/admin/comment">管理员评论</a>
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
                            <select name="status" class="form-control inline" id="status">
                                <option value="">请选择状态</option>
                                <option value="1"  >入职</option>
                                <option value="2"  >失效</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="mix_kw" placeholder="管理员名称或者手机号" class="form-control" value="">
                        <span class="input-group-btn">
                            <button type="button" class="btn  btn-primary search" id="button">
                                <i class="fa fa-search"></i>搜索
                            </button>
                        </span>
                            </div>
                        </div>
                    </div>
                    <hr/>
                </form>
                <table class="table table-bordered m-t">
                    <thead>
                    <tr>
                        <th>头像</th>
                        <th>管理员名称</th>
                        <th>手机号</th>
                        <th>邮箱</th>
                        <th>性别</th>
                        <th>昵称</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody id="pp">
                    <?php foreach($list as $key =>$val): ?>
                    <tr>
                        <td><img src="http://www.13zp.com<?= $val['img']?>" width="100"></td>
                        <td><?= $val['adm_name']?></td>
                        <td><?= $val['photo']?></td>
                        <td><?= $val['email']?></td>
                        <td><?php echo $val['sex']==1 ?  '男' : '女'?></td>
                        <td><?= $val['nikename']?></td>
                        <td><?php echo $val['study']==1 ?  '入职' : '失效'?></td>
                        <td>
                            <a  href="/web/admin/info?id=<?= $val['adm_id']?>">
                                <i class="fa fa-eye fa-lg"></i>
                            </a>
                            <a clas s="m-l" href="/web/admin/update?id=<?= $val['adm_id']?>">
                                <i class="fa fa-edit fa-lg"></i>
                            </a>

                            <a class="m-l remove" href="admin_del?adm_id=<?= $val['adm_id']?>&study=<?= $val['study']?>" data="2">
                                <i class="fa fa-trash fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach?>
                    </tbody>
                </table>
                <center>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="pagination pagination-lg pull-right" style="margin: 0 0 ;">

                            <div id="box">
                                <span class="pagination_count" style="line-height: 40px;">共<?= $arr['page_num']?>页 | 每页2条 | 第<?= $arr['p']?>页</span>
                                <a href="javascript:void(0)" id="p" value="1">首页</a>
                                <a href="javascript:void(0)" id="p" value="<?= $arr['up']?>">上一页</a>
                                <a href="javascript:void(0)" id="p" value="<?= $arr['dome']?>">下一页</a>
                                <a href="javascript:void(0)" id="p" value="<?= $arr['page_num']?>">尾页</a>
                            </div>

                        </ul>
                    </div>
                </div>
                </center>
            </div>
        </div>
</div>

</body>
</html>
<script src="/js/jq.js"></script>
<script>
    $(document).on('click','#button',function(){
        var p=$(this).attr('value');
        var status=$('#status').val();
        var mix_kw=$('input[name=mix_kw]').val();
        $.ajax({
            url: '/web/admin/index',
            type: 'get',
            data: {status: status,mix_kw:mix_kw,p:p},
            dataType: 'json',
            success:function(msg){
                var str = '';
                $.each(msg.list, function (k, v) {
                    str += "<tr>";
                    str += "<td><img src=" +'http://www.13zp.com'+ v.img + " width='100'></td>";
                    str += "<td>" + v.adm_name + "</td>";
                    str += "<td>" + v.photo + "</td>";
                    str += "<td>" + v.email + "</td>";
                    str += "<td>";
                    if (v.sex == 1) {
                        str += '男';
                    }
                    if (v.sex == 0) {
                        str += '保密';
                    }
                    if (v.sex == 2) {
                        str += '保密';
                    }
                    str += "</td>";
                    str += "<td>" + v.nikename + "</td>";
                    str += "<td>";
                    if (v.study == 1) {
                        str += '在职';
                    } else {
                        str += '失效';
                    }
                    str += "</td>";
                    str += "<td>";
                    str += "<a  href='/web/admin/info?id=" + v.adm_id + "'>";
                    str += "<i class='fa fa-eye fa-lg'></i>";
                    str += "</a>";
                    str += "<a class='m-l' href='/web/admin/update?id=" + v.adm_id + "'>";
                    str += "<i class='fa fa-edit fa-lg'></i>";
                    str += "</a>";
                    str += "<a class='m-l remove' href='admin_del?adm_id=" + v.adm_id + "&study=" + v.study + "' data='2'>";
                    str += "<i class='fa fa-trash fa-lg'></i>";
                    str += "</a>";
                    str += "</td>";
                    str += "</tr>";
                });
                $('#pp').html(str);
                var con="";
                con+="<span class='pagination_count' style='line-height: 40px;'>共"+msg.arr.page_num+"页 | 每页2条 | 第"+msg.arr.p+"页</span>";
                con+="<a href='javascript:void(0)' id='p' value='1'>首页</a>";
                con+="<a href='javascript:void(0)' id='p' value="+ msg.arr.up+">上一页</a>";
                con+="<a href='javascript:void(0)' id='p' value="+ msg.arr.dome+">下一页</a>";
                con+="<a href='javascript:void(0)' id='p' value="+ msg.arr.page_num+">尾页</a>";
                $('#box').html(con);
            }
        })
    })
</script>
<script>
    $(document).on('click','#p',function(){
        var p=$(this).attr('value');
        var status=$('#status').val();
        var mix_kw=$('input[name=mix_kw]').val();
        $.ajax({
            url:'/web/admin/index',
            type:'get',
            data: {status: status,mix_kw:mix_kw,p:p},
            dataType:'json',
            success:function(msg) {
                var str = '';
                $.each(msg.list, function (k, v) {
                    str += "<tr>";
                    str += "<td><img src=" +'http://www.13zp.com'+ v.img + " width='100'></td>";
                    str += "<td>" + v.adm_name + "</td>";
                    str += "<td>" + v.photo + "</td>";
                    str += "<td>" + v.email + "</td>";
                    str += "<td>";
                    if (v.sex == 1) {
                        str += '男';
                    }
                    if (v.sex == 0) {
                        str += '保密';
                    }
                    if (v.sex == 2) {
                        str += '保密';
                    }
                    str += "</td>";
                    str += "<td>" + v.nikename + "</td>";
                    str += "<td>";
                    if (v.study == 1) {
                        str += '在职';
                    } else {
                        str += '失效';
                    }
                    str += "</td>";
                    str += "<td>";
                    str += "<a  href='/web/admin/info?id=" + v.adm_id + "'>";
                    str += "<i class='fa fa-eye fa-lg'></i>";
                    str += "</a>";
                    str += "<a class='m-l' href='/web/admin/update?id=" + v.adm_id + "'>";
                    str += "<i class='fa fa-edit fa-lg'></i>";
                    str += "</a>";
                    str += "<a class='m-l remove' href='admin_del?adm_id=" + v.adm_id + "&study=" + v.study + "' data='2'>";
                    str += "<i class='fa fa-trash fa-lg'></i>";
                    str += "</a>";
                    str += "</td>";
                    str += "</tr>";
                });
                $('#pp').html(str);
                var con="";
                con+="<span class='pagination_count' style='line-height: 40px;'>共"+msg.arr.page_num+"页 | 每页2条 | 第"+msg.arr.p+"页</span>";
                con+="<a href='javascript:void(0)' id='p' value='1'>首页</a>";
                con+="<a href='javascript:void(0)' id='p' value="+ msg.arr.up+">上一页</a>";
                con+="<a href='javascript:void(0)' id='p' value="+ msg.arr.dome+">下一页</a>";
                con+="<a href='javascript:void(0)' id='p' value="+ msg.arr.page_num+">尾页</a>";
                $('#box').html(con);
                }
     })
  })
</script>




