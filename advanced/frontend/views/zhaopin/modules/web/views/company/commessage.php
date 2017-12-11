<?php
use app\common\services\Urlservice;
?>
<div class="row m-t">
    <div class="col-lg-9 col-lg-offset-2 m-t">
        <dl class="dl-horizontal">
            <dt>企业名称</dt>
            <dd><?= $data['f_name']?></dd>
            <dt>企业Logo</dt>
            <dd>
                <img class="img-circle circle-border" src="<?= Urlservice::buildWwwUrl('/'.$data['f_logo'])?>" style="width: 100px;height: 100px;"/>
            </dd>
            <dt>企业联系电话/座机</dt>
            <dd><?= $data['f_tel']?></dd>
            <dt>地址</dt>
            <dd><?= $data['f_site']?></dd>
            <dt>企业介绍</dt>
            <dd><?= $data['f_introduce']?></dd>
            <dt>企业规模</dt>
            <dd><?= $data['f_scale'][0]?>-<?= $data['f_scale'][1]?>人</dd>
            <dt>企业领域</dt>
            <dd>
                <?php foreach($data['b_id'] as $k=>$v):?>
                    <?php if($k==0){?>
                        <?= $v['i_name']?>
                    <?php }else{?>
                        <?= '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;'.$v['i_name'];?>
                    <?php }?>
                <?php endforeach?>
            </dd>
            <dt>企业资质</dt>
            <dd><?= $data['seedtime']?></dd>
            <dd>
                <a href="<?= Urlservice::buildWebUrl('/company/set-message?id='.$c_id)?>" class="btn btn-outline btn-primary btn-w-m">编辑</a>
                <a href="<?= Urlservice::buildWebUrl('/company/index')?>" class="btn btn-outline btn-primary btn-w-m">返回</a>
            </dd>
        </dl>
    </div>
</div>