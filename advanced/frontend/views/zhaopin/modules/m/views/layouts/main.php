<?php
\app\assets\AppAsset::register($this);
$this->beginPage();
use app\common\services\Urlservice;
?>

<!DOCTYPE HTML>
<html xmlns:wb="http://open.weibo.com/wb">
<head>
    <base href="/"/>
    <script id="allmobilize" charset="utf-8" src="<?= Urlservice::buildWwwUrl('/style/js/allmobilize.min.js')?>"></script>
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
    <link rel="Shortcut Icon" href="h/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= Urlservice::buildWwwUrl('/style/css/style.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?= Urlservice::buildWwwUrl('/style/css/external.min.css')?>"/>
    <link rel="stylesheet" type="text/css" href="<?= Urlservice::buildWwwUrl('/style/css/popup.css')?>"/>
    <script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?= Urlservice::buildWwwUrl('/style/js/jquery.lib.min.js')?>"></script>
    <script src="<?= Urlservice::buildWwwUrl('/style/js/ajaxfileupload.js')?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?= Urlservice::buildWwwUrl('/style/js/additional-methods.js')?>"></script>
    <!--[if lte IE 8]>
    <script type="text/javascript" src="<?= Urlservice::buildWwwUrl('/style/js/excanvas.js')?>"></script>
    <![endif]-->
    <script type="text/javascript">
        var youdao_conv_id = 271546;
    </script>
    <script type="text/javascript" src="style/js/conv.js"></script>
</head>
<body>
<?php $this->beginBody();?>
<div id="body">
    <div id="header">
        <div class="wrapper">
            <a href="index.html" class="logo">
                <img src="<?php echo Urlservice::buildWwwUrl('/style/images/logo.png')?>" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
            </a>
            <ul class="reset" id="navheader">
                <li><a href="<?= Urlservice::buildMUrl('/default/index')?>">首页</a></li>
                <li ><a href="<?= Urlservice::buildMUrl('/company/index')?>" >公司</a></li>
                <li ><a href="<?= Urlservice::buildMUrl('/logo/index')?>" target="_blank">广告位招商</a></li>
                <li ><a href="<?= Urlservice::buildMUrl('/jianli/index')?>" rel="nofollow">我的简历</a></li>
                <li ><a href="<?= Urlservice::buildMUrl('/create/index')?>" rel="nofollow">发布职位</a></li>
            </ul>
            <ul class="loginTop">
                <li>
                    <a href="<?= Urlservice::buildMUrl('/login/login')?>" rel="nofollow">登录</a>
                </li>
                <li>|</li>
                <li>
                    <a href="<?= Urlservice::buildMUrl('/login/register')?>" rel="nofollow">注册</a>
                </li>
            </ul>
        </div>
    </div><!-- end #header -->

    <?php echo $content;?>




    <!-- <div id="qrSide"><a></a></div> -->
    <!--  -->

    <!-- <div id="loginToolBar">
        <div>
            <em></em>
            <img src="style/images/footbar_logo.png" width="138" height="45" />
            <span class="companycount"></span>
            <span class="positioncount"></span>
            <a href="#loginPop" class="bar_login inline" title="登录"><i></i></a>
            <div class="right">
                <a href="register.html?from=index_footerbar" onclick="_hmt.push(['_trackEvent', 'button', 'click', 'register'])" class="bar_register" id="bar_register" target="_blank"><i></i></a>
            </div>
            <input type="hidden" id="cc" value="16002" />
            <input type="hidden" id="cp" value="96531" />
        </div>
    </div>
     -->
    <!-------------------------------------弹窗lightbox  ----------------------------------------->
    <div style="display:none;">
        <!-- 登录框 -->
        <div id="loginPop" class="popup" style="height:240px;">
            <form id="loginForm">
                <input type="text" id="email" name="email" tabindex="1" placeholder="请输入登录邮箱地址" />
                <input type="password" id="password" name="password" tabindex="2" placeholder="请输入密码" />
                <span class="error" style="display:none;" id="beError"></span>
                <label class="fl" for="remember"><input type="checkbox" id="remember" value="" checked="checked" name="autoLogin" /> 记住我</label>
                <a href="h/reset.html" class="fr">忘记密码？</a>
                <input type="submit" id="submitLogin" value="登 &nbsp; &nbsp; 录" />
            </form>
            <div class="login_right">
                <div>还没有拉勾帐号？</div>
                <a href="register.html" class="registor_now">立即注册</a>
                <div class="login_others">使用以下帐号直接登录:</div>
                <a href="h/ologin/auth/sina.html" target="_blank" id="icon_wb" class="icon_wb" title="使用新浪微博帐号登录"></a>
                <a href="h/ologin/auth/qq.html" class="icon_qq" id="icon_qq" target="_blank" title="使用腾讯QQ帐号登录" ></a>
            </div>
        </div><!--/#loginPop-->
    </div>
    <!------------------------------------- end ----------------------------------------->
    <script type="text/javascript" src="<?php echo Urlservice::buildWwwUrl('/style/js/Chart.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo Urlservice::buildWwwUrl('/style/js/home.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo Urlservice::buildWwwUrl('/style/js/count.js')?>"></script>
    <div class="clear"></div>
    <input type="hidden" id="resubmitToken" value="" />
    <a id="backtop" title="回到顶部" rel="nofollow"></a>
</div><!-- end #container -->

</div><!-- end #body -->
<div id="footer">
    <div class="wrapper">
        <a href="h/about.html" target="_blank" rel="nofollow">联系我们</a>
        <a href="h/af/zhaopin.html" target="_blank">互联网公司导航</a>
        <a href="http://e.weibo.com/lagou720

" target="_blank" rel="nofollow">拉勾微博</a>
        <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
        <div class="copyright">&copy;2013-2014 Lagou <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action

">京ICP备14023790号-2</a></div>
    </div>
</div>
<script type="text/javascript" src="<?= Urlservice::buildWwwUrl('/style/js/core.min.js')?>"></script>
<script type="text/javascript" src="<?= Urlservice::buildWwwUrl('/style/js/popup.min.js')?>"></script>
<?php $this->endBody();?>
</body>
<?php $this->endPage();?>
</html>
