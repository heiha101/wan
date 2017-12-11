<?php
use yii\widgets\LinkPager;
use app\common\services\Urlservice;
use app\common\services\StaticServer;
StaticServer::jsAssets('/js/web/pos_sub.js');
?>
<div class="row  border-bottom">
    <div class="col-lg-12">
        <div class="tab_title">
            <ul class="nav nav-pills">
                <li  >
                    <a href="<?= Urlservice::buildWebUrl('/company/index')?>">公司账户列表</a>
                </li>
                <li  class="current"  >
                    <a href="<?= Urlservice::buildWebUrl('/company/com-postion')?>">公司招聘信息列表</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-inline wrap_search" action="<?= Urlservice::buildWebUrl('/company/com-postion')?>">
            <div class="row m-t p-w-m">
                <div class="form-group">
                    <select name="status" id="statusw" class="form-control inline">
                        <option value="">请选择状态</option>
                        <option value="1"  >待审核</option>
                        <option value="2"  >已通过</option>
                        <option value="3"  >未通过</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="job_cate_id" id="job_cate_id" class="form-control inline">
                        <option value="">请选择分类</option>
                       <?php foreach($job as $k=>$v):?>
                        <option value="<?= $v['job_cate_name']?>" style="margin-left: <?= $v['level']?>em"><?= $v['job_cate_name']?></option>
                       <?php endforeach?>
                    </select>
                </div>

                <div class="form-group">
                    <div class="input-group">
						<span class="input-group-btn">
                            <button type="submit" class="btn btn-primary search">
                                <i class="fa fa-search"></i>搜索
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-w-m btn-outline btn-primary pull-right" href="<?= Urlservice::buildWebUrl('/company/create_user')?>">
                        <i class="fa fa-plus"></i>账号
                    </a>
                </div>
            </div>
        </form>
        <table class="table table-bordered m-t">
            <thead>
            <tr>
                <th>序号</th>
                <th>类别名称</th>
                <th>职位名称</th>
                <th>所属部门</th>
                <th>工作性质</th>
                <th>最小薪资</th>
                <th>最大薪资</th>
                <th>职位诱惑</th>
                <th>审核状态</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model as $k=>$v):?>
            <tr>
                <td><?= $v['postion_id']?></td>
                <td><?= $v['postion']?></td>
                <td><?= $v['postion_name']?></td>
                <td><?= $v['sector']?></td>
                <td><?= $v['nature']?></td>
                <td><?= $v['range']?></td>
                <td><?= $v['background']?></td>
                <td><?= $v['address']?></td>
                <td>
                    <select name="status" id="status" class="status">
                        <option value="1" <?php if($v['status']==1)echo "selected";?>>待审核</option>
                        <option value="2" <?php if($v['status']==2)echo "selected";?>>已通过</option>
                        <option value="3" <?php if($v['status']==3)echo "selected";?>>未通过</option>
                    </select>
                    <input type="hidden" id="postion_id" value="<?= $v['postion_id']?>"/>
                </td>
                <td>
                    <a  href="#">
                        <i class="fa fa-eye fa-lg"></i>
                    </a>
                    <a class="m-l remove" href="javascript:void(0);" data="13">
                        <i class="fa fa-trasrh fa-lg"></i>
                    </a>
                </td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-lg-12">
                <span class="pagination_count" style="line-height: 40px;">共条<?= $count?>记录 |当前页<?= $num?>条</span>
                <ul class="pagination pagination-lg pull-right" style="margin: 0 0 ;">
                    <li class="active"><?php echo LinkPager::widget(['pagination' => $pages]);?></li>
                </ul>

            </div>
        </div>	</div>
</div>
