<?php
\app\assets\AppAsset::register($this);
$this->beginPage();
use app\common\services\Urlservice;
?>

<div class="sidebar">
    <a class="btn_create" href="/m/create/index">发布新职位</a>
    <dl class="company_center_aside">
        <dt>我收到的简历</dt>
        <dd>
            <a href="<?= Urlservice::buildMUrl('/create/pending')?>">待处理简历</a>
        </dd>
        <dd>
            <a href="<?= Urlservice::buildMUrl('/create/have')?>">待定简历</a>
        </dd>
        <dd>
            <a href="<?= Urlservice::buildMUrl('/create/notice')?>">已通知面试简历</a>
        </dd>
        <dd>
            <a href="<?= Urlservice::buildMUrl('/create/refuse')?>">不合适简历</a>
        </dd>
        <dd class="btm">
            <a href="<?= Urlservice::buildMUrl('/create/auto')?>">自动过滤简历</a>
        </dd>
    </dl>
    <dl class="company_center_aside">
        <dt>我发布的职位</dt>
        <dd>
            <a href="<?= Urlservice::buildMUrl('/create/positions')?>">有效职位</a>
        </dd>
        <dd>
            <a href="<?= Urlservice::buildMUrl('/create/postion')?>">已下线职位</a>
        </dd>
    </dl>
</div><!-- end .sidebar -->
<?php echo $content;?>
