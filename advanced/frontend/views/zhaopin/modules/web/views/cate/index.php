<?php
use yii\widgets\LinkPager;
use app\common\services\Urlservice;
use app\common\services\StaticServer;
StaticServer::jsAssets('/js/web/cate_index.js');
?>
<style type="text/css">
    .edit-input{
        width: 50px;
    }
    .edit-span{
        cursor:pointer;
    }
    .open-child{
        color:limegreen;
    }
    .tr-none{
        display: none;
    }
    .close-child{
        color:mediumvioletred;
    }
</style>
<div class="row  border-bottom">
    <div class="col-lg-12">
        <div class="tab_title">
            <ul class="nav nav-pills">
                <li  class="current"  >
                    <a href="/web/account/index">分类列表</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-w-m btn-outline btn-primary pull-right" href="<?= \app\common\services\Urlservice::buildWebUrl('/cate/cate_add')?>">
                        <i class="fa fa-plus"></i>添加分类
                    </a>
                </div>
            </div>

        <table class="table table-bordered m-t">
            <thead>
            <tr>
                <th>序号</th>
                <th>工作分类名称</th>
                <th>工作分类排序</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($res as $key => $v) : ?>
                <tr data-pid="<?php echo $v['parent_id']?>" data-id="<?php echo $v['job_cate_id']?>" class="<?php echo  $v['parent_id']!=0 ? "tr-none" :'' ?>">
                    <td><?php echo $v['job_cate_id']?></td>

                    <td>
                        <span class="open-child">展开</span>
                        <span class='edit-span' style="padding-left:<?=$v['level']*2?>px" ><?=$v['job_cate_name']?></span>
                    </td>
                    <td>
                        <span class="edit-span"><?=  $v['job_cate_sort']?></span>
                    </td>
                    <td>
                        <a class="m-l remove" href="<?= \app\common\services\Urlservice::buildWebUrl('/cate/cate_del')?>?id=<?php echo $v['job_cate_id']?>">
                            <i class="fa fa-trash fa-lg"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-lg-12">
                <span class="pagination_count" style="line-height: 40px;">共条记录 | 每页条</span>
                <ul class="pagination pagination-lg pull-right" style="margin: 0 0 ;">
                    <li class="active"></li>
                </ul>
            </div>
        </div>	</div>
</div>

