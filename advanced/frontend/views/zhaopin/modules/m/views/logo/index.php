<?php
use \app\common\services\Urlservice;
\app\common\services\StaticService::includeJs('/js/m/logo/logo.js',['depends'=>\app\assets\AppAsset::className()]);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script id="allmobilize" charset="utf-8" src="<?php echo Urlservice::buildWwwUrl('/style/js/allmobilize.min.js')?>"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate" media="handheld"  />
    <!-- end 云适配 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>拉勾网-最专业的互联网招聘平台</title>
    <meta property="qc:admins" content="23635710066417756375" />
    <meta content="拉勾网是3W旗下的互联网领域垂直招聘网站,互联网职业机会尽在拉勾网" name="description">
    <meta content="拉勾,拉勾网,拉勾招聘,拉钩, 拉钩网 ,互联网招聘,拉勾互联网招聘, 移动互联网招聘, 垂直互联网招聘, 微信招聘, 微博招聘, 拉勾官网, 拉勾百科,跳槽, 高薪职位, 互联网圈子, IT招聘, 职场招聘, 猎头招聘,O2O招聘, LBS招聘, 社交招聘, 校园招聘, 校招,社会招聘,社招" name="keywords">
    <meta name="baidu-site-verification" content="QIQ6KC1oZ6" />

    <!-- <div class="web_root"  style="display:none">h</div> -->
    <script type="text/javascript">
        var ctx = "h";
        console.log(1);
    </script>
    <link rel="Shortcut Icon" href="<?php echo Urlservice::buildWwwUrl('h/images/favicon.ico')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo Urlservice::buildWwwUrl('/style/css/style.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Urlservice::buildWwwUrl('/style/css/external.min.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Urlservice::buildWwwUrl('/style/css/popup.css')?>"/>
    <script src="<?php echo Urlservice::buildWwwUrl('/style/js/jquery.1.10.1.min.js')?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo Urlservice::buildWwwUrl('/style/js/jquery.lib.min.js')?>"></script>
    <script src="<?php echo Urlservice::buildWwwUrl('/style/js/ajaxfileupload.js')?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo Urlservice::buildWwwUrl('/style/js/additional-methods.js')?>"></script>
    <!--[if lte IE 8]>
    <script type="text/javascript" src="<?php echo Urlservice::buildWwwUrl('/style/js/excanvas.js')?>"></script>
    <![endif]-->
    <script type="text/javascript">
        var youdao_conv_id = 271546;
    </script>
    <script type="text/javascript" src="<?php echo Urlservice::buildWwwUrl('/style/js/conv.js')?>"></script>
</head>
<body>
<center>
<div id="header">
    <div class="wrapper">
        <a href="index.html" class="logo">
            <img src="<?php echo Urlservice::buildWwwUrl('/style/images/logo.png')?>" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
        </a>
        <ul class="reset" id="navheader">
            <li><a href="<?= Urlservice::buildMUrl('/default/index')?>">首页</a></li>
            <li ><a href="<?= Urlservice::buildMUrl('/company/index')?>" >公司</a></li>
            <li class="current"><a href="<?= Urlservice::buildMUrl('/logo/index')?>" target="_blank">广告位招商</a></li>
            <li ><a href="<?= Urlservice::buildMUrl('/jianli/index')?>" rel="nofollow">我的简历</a></li>
            <li ><a href="<?= Urlservice::buildMUrl('/create/index')?>" rel="nofollow">发布职位</a></li>
        </ul>
        <ul class="loginTop">
            <li><a href="<?php echo Urlservice::buildWwwUrl('login/login')?>" rel="nofollow">登录</a></li>
            <li>|</li>
            <li><a href="<?php echo Urlservice::buildWwwUrl('login/register')?>" rel="nofollow">注册</a></li>
        </ul>
    </div>
</div><br/><!-- end #header -->
<!-- 公司用户用来竞标广告位，涉及到防非法登陆，上传公司logo并投注金额 广告位为期一周展示-->
    <div>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>公司名称：</td>
                <td><input type="text" name="compny_name" ></td>
            </tr>
            <tr>
                <td>公司联系方式：</td>
                <td><input type="text" name="compny_tel"></td>
            </tr>
            <tr>
                <td>公司LOGO：</td>
                <td style="height: 100px;width: 100px"><input type="file" multiple id="inputs" name="file"/>
                    <div id='dd' style="width:70px;height:50px"></div>
                </td>
            </tr>
            <tr>
                <td>投注金额：</td>
                <td><input type="text" name="compny_money" id="compny_money"></td>
            </tr>
            <tr>
                <td><input type="submit" value="提交申请"></td>
                <td><input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
        </div>
</body>
</html>
<script src="/js/m/logo/logo.js"></script>
<script>

</script>