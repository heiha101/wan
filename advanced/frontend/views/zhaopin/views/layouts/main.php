<?php
use  \app\common\services\Urlservice;
\app\assets\AppAsset::register($this);
$this->beginPage();
?>

<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>三组</title>
    <?php $this->head();?>
<!--    <link href="--><?//= Urlservice::buildWwwUrl('/css/www/app.css')?><!--" rel="stylesheet"></head>-->
<body>
<?php $this->beginBody();?>
<div class="navbar navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-collapse collapse pull-left">
            <ul class="nav navbar-nav ">
                <li><a href="<?= Urlservice::buildMUrl('default/index')?>">前台首页</a></li>
                <li><a href="<?= Urlservice::buildWebUrl('admin/login')?>">管理后台</a></li>
            </ul>
        </div>
    </div>
</div>

<?= $content ?>
<?php $this->endBody();?>
</body></html>
<?php $this->endPage();?>