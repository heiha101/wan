<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <link href="/css/web/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/web/style.css?ver=20170401" rel="stylesheet"></head>

<body>
<div id="wrapper">
        <div class="row  border-bottom">
            <div class="col-lg-12">
                <div class="tab_title">
                    <ul class="nav nav-pills">
                        <li  >
                            <a href="/web/finance/index">订单列表</a>
                        </li>
                        <li  class="current"  >
                            <a href="javascript:void(0)">财务流水</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered m-t">
                        <tr>
                            <td>公司名称：</td>
                            <td><?php echo $info['comp_name']?></td>
                        </tr>
                        <tr>
                            <td>公司联系方式：</td>
                            <td><?php echo $info['comp_tel']?></td>
                        </tr>
                        <tr>
                            <td>公司LOGO：</td>
                            <td>
                                <img src="http://www.13zp.com/<?php echo $info['comp_img']?>" alt="" style="width: 90px;"/>
                            </td>
                        </tr>
                        <tr>
                            <td>投注金额：</td>
                            <td><?php echo $info['comp_money']?></td>
                        </tr>
                        <tr>
                            <td>竞标时间</td>
                            <td><?php echo $info['comp_settime']?></td>
                        </tr>

                </table>
                <div class="row">
                </div>
            </div>
        </div>
</div>
</body>
</html>
