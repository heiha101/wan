<?php
use app\common\services\Urlservice;
use yii\widgets\Breadcrumbs;
\app\assets\WebAsset::register($this);
$this->beginPage();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
  <!--  <style>
        #body{
            background-image: url("<?/*= \app\common\services\Urlservice::buildWwwUrl('/images/web/1.jpg')*/?>");
            background-repeat: no-repeat;
        }
    </style>-->
        <?php $this->head();?>
<!--    <link href="/css/web/bootstrap.min.css" rel="stylesheet">-->
<!--    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">-->
<!--    <link href="/css/web/style.css?ver=20170401" rel="stylesheet">-->
</head>

<body id="body">
<?php $this->beginBody()?>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="profile-element text-center">
                        <img alt="image" class="img-circle" src="/images/web/logo.png" />
                        <p class="text-muted">哈哈哈</p>
                    </div>
                    <div class="logo-element">
                        <img alt="image" class="img-circle" src="/images/web/logo.png" />
                    </div>
                </li>
                <li class="dashboard">
                    <a href="/web/dashboard/index"><i class="fa fa-dashboard fa-lg"></i>
                        <span class="nav-label">仪表盘</span></a>
                </li>
                <li class="account">
                    <a href="<?= Urlservice::buildWebUrl('/company/index')?>"><i class="fa fa-user fa-lg"></i> <span class="nav-label">公司用户管理</span></a>
                </li>
                <li class="book">
                    <a href="/web/admin/index"><i class="fa fa-book fa-lg"></i> <span class="nav-label">管理员后台</span></a>
                </li>

                <li class="member">
                    <a href="<?= Urlservice::buildWebUrl('/member/info')?>"><i class="fa fa-group fa-lg"></i> <span class="nav-label">会员管理</span></a>
                </li>


                <li class="brand">
                    <a href="<?= Urlservice::buildWebUrl('/cate/info')?>"><i class="fa fa-cog fa-lg"></i> <span class="nav-label">分类管理</span></a>
                </li>
                <li class="finance">
                    <a href="/web/finance/index"><i class="fa fa-rmb fa-lg"></i> <span class="nav-label">财务管理</span></a>
                </li>
                <li class="stat">
                    <a href="/web/stat/index"><i class="fa fa-bar-chart fa-lg"></i> <span class="nav-label">统计管理</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg" style="background-color: #ffffff;">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="javascript:void(0);"><i class="fa fa-bars"></i> </a>

                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
						<span class="m-r-sm text-muted welcome-message">
                            欢迎<?= isset($this->params['current_user']['adm_name']) ? $this->params['current_user']['adm_name'] : '' ?>使用哈哈哈招聘
                        </span>
                    </li>
                    <li class="hidden">
                        <a class="count-info" href="javascript:void(0);">
                            <i class="fa fa-bell"></i>
                            <span class="label label-primary">8</span>
                        </a>
                    </li>


                    <li class="dropdown user_info">
                        <a  class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            <img alt="image" class="img-circle" src="/images/web/12.jpg" />
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    姓名：
                                    <?= isset($this->params['current_user']['adm_name']) ? $this->params['current_user']['adm_name'] : ''?>
                                    <a href="<?php echo Urlservice::buildwebUrl('/admin/edit')?>" class="pull-right">编辑</a>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    手机号码：
                                    <?= isset($this->params['current_user']['photo']) ? $this->params['current_user']['photo'] : ''?>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="link-block text-center">
                                    <a class="pull-left" href="<?php echo Urlservice::buildwebUrl('/admin/pwd')?>">

                                       <i class="fa fa-lock"></i> 修改密码
                                    </a>
                                    <a class="pull-right" href="<?php echo Urlservice::buildwebUrl('/admin/logout')?>">
                                        <i class="fa fa-sign-out"></i> 退出
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>

            </nav>
        </div>
<?= $content ?>

    </div>
</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
<?php $this->js?>