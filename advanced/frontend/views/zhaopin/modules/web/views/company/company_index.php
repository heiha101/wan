<?php
use yii\widgets\LinkPager;
use app\common\services\Urlservice;
use app\common\services\StaticServer;
StaticServer::jsAssets('/js/web/company_sub.js');
?>
<div class="row  border-bottom">
    <div class="col-lg-12">
        <div class="tab_title">
            <ul class="nav nav-pills">
                <li  class="current"  >
                    <a href="<?= Urlservice::buildWebUrl('/company/index')?>">公司账户列表</a>
                </li>
                <li >
                    <a href="<?= Urlservice::buildWebUrl('/company/com-postion')?>">公司发布职位列表</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <form class="form-inline wrap_search" action="<?= Urlservice::buildWebUrl('/company/index')?>">
            <div class="row m-t p-w-m">
                <div class="form-group">
                    <select name="status" id="status" class="form-control inline">
                        <option value="">请选择状态</option>
                        <option value="3"  >未审核</option>
                        <option value="1"  >已审核</option>
                        <option value="2"  >已删除</option>
                    </select>

                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" name="mix_kw" id="mix_kw" placeholder="公司名称或者邮箱" class="form-control" value="">
                        <!--分页隐藏域-->
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
                        <i class="fa fa-plus"></i>添加
                    </a>
                </div>
            </div>
        </form>
        <table class="table table-bordered m-t">
            <thead>
            <tr>
                <th>序号</th>
                <th>公司名称</th>
                <th>联系方式</th>
                <th>邮箱</th>
                <th>是否可用</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($model as $k=>$v):?>
            <tr>
                <td><?= $v['c_id']?></td>
                <td><?= $v['c_name']?></td>
                <td><?= $v['c_tel']?></td>
                <td><?= $v['c_email']?></td>
                <td>
                    <select name="status" id="status" class="status">
                        <option value="3" <?php if($v['status']==0)echo "selected";?>>待审核</option>
                        <option value="1" <?php if($v['status']==1)echo "selected";?>>已审核</option>
                        <option value="2" <?php if($v['status']==2)echo "selected";?>>已删除</option>
                    </select>
                    <input type="hidden" id="c_id" value="<?= $v['c_id']?>"/>
                </td>
                <td>
                    <a  href="<?= Urlservice::buildWebUrl('/company/com-info?id='.$v['c_id'])?>">
                        <i class="fa fa-eye fa-lg"></i>
                    </a>
                    <a class="m-l remove" href="javascript:void(0);" data="13">
                        <i class="fa fa-trash fa-lg"></i>
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
