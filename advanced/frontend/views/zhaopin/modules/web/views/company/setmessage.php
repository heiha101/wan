<?php
use app\common\services\Urlservice;
use app\common\services\StaticServer;
StaticServer::jsAssets('/js/web/com_setmessage.js');
?>
<style>
    .cate{

        background-color: #1ab394;

    }
    .text_b{
        color: #fff;
    }
</style>
<form class="upload_pic_wrap" enctype="multipart/form-data" method="POST" action="<?= Urlservice::buildWebUrl('/company/set-message')?>">
    <input type="hidden" name="c_id" value="<?= $c_id?>"/>
    <div id="wrapper">
            <div class="col-lg-12">
                <h2 class="text-center">企业信息设置</h2>
                <div class="form-horizontal m-t m-b">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">企业名称:</label>
                        <div class="col-lg-10">
                            <input type="text" name="f_name" class="form-control" placeholder="请输入企业名称~~" value="<?= $data['f_name']?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">企业Logo:</label>
                        <div class="col-lg-10">
                                <div class="upload_wrap pull-left">
                                    <i class="fa fa-upload fa-2x"></i>
                                    <input type="file" name="f_logo" id="doc" onchange="javascript:setImagePreview();" value="<?= Urlservice::buildWwwUrl('/'.$data['f_logo'])?>"  accept="image/png, image/jpeg, image/jpg,image/gif">
                                </div>
						                            <span class="pic-each">
							<img id="preview" src="<?= Urlservice::buildWwwUrl('/'.$data['f_logo']);?>">
							<span id="del_img" class="fa fa-times-circle del del_image" data="20170301/a8887738ab1bfd71765dd063fee4ddaa.jpg"><i></i></span>
						</span>

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">企业电话/座机:</label>
                        <div class="col-lg-10">
                            <input type="text" name="f_tel" class="form-control" placeholder="请输入联系电话~~"  value="<?= $data['f_tel']?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">企业地址:</label>
                        <div class="col-lg-10">
                            <input type="text" name="f_site" class="form-control" placeholder="请输入联系地址~~"  value="<?= $data['f_site']?>">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司规模:</label>
                        <div class="col-lg-10">
                            <input type="text" name="f_scale[]" size="5em" style="border: 1px #dcdcdc solid" placeholder="请输入最少人数~~"  value="<?= $data['f_scale'][0]?>">-
                            <input type="text" name="f_scale[]" size="5em" style="border: 1px #dcdcdc solid" placeholder="请输入最大人数~~"  value="<?= $data['f_scale'][1]?>">人
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">企业介绍:</label>
                        <div class="col-lg-10">
                            <textarea  name="f_introduce" class="form-control" rows="4"><?= $data['f_introduce']?></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">融资阶段:</label>
                        <div class="col-lg-10">
                            <select name="e_id" class="form-control" style="width: 200px">
                                <option value="">--请选择--</option>
                                <?php foreach($e_id as $k=>$v):?>
                                    <option value="<?=$v['e_id']?>"<?php if($data['e_id']==$v['e_id'])echo  'selected';?>><?= $v['e_stage']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司资质:</label>
                        <div class="col-lg-10">
                            <select name="seedtime" class="form-control" style="width: 200px">
                                <option value="">--请选择--</option>
                                <option value="1" <?php if($data['seedtime']==1)echo "selected";?>>初创型</option>
                                <option value="2" <?php if($data['seedtime']==2)echo "selected";?>>成长型</option>
                                <option value="3" <?php if($data['seedtime']==3)echo "selected";?>>成熟型</option>
                                <option value="4" <?php if($data['seedtime']==4)echo "selected";?>>已上市</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司领域:</label>
                        <div class="col-lg-10">
                            <?php foreach($industy as $k=>$v):?>
                                <?php if($k%4==0) echo '<br />'?>
                                <button data-id="<?=$v['i_id']?>"  class="btn btn-w-m btn-outline btn-primary <?php if(in_array($v['i_id'],explode(',',$data['b_id']))){ echo 'cate';}else{echo 'industy'; }?>"><span class="<?php if(in_array($v['i_id'],explode(',',$data['b_id']))) echo 'text_b'?>"><?=$v['i_name']?></span></button>
                            <?php endforeach?>
                            <input type="hidden" name="b_id" id="b_id"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">公司地区:</label>
                        <div class="col-lg-10">
                            <select name="region_id" class="form-control" style="width: 200px">
                                <option value="">--请选择--</option>
                                <?php foreach($region as $k=>$v):?>
                                    <option value="<?=$v['r_id']?>"<?php if($data['region_id']==$v['r_id'])echo  'selected';?>><?= $v['r_name']?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">企业风采:</label>
                        <div class="col-lg-10">
                            <div class="upload_wrap pull-left">
                                <i class="fa fa-upload fa-2x"></i>
                                <input type="file" name="f_photo[]" accept="image/png, image/jpeg, image/jpg,image/gif">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">企业风采:</label>
                        <div class="col-lg-10">
                            <div class="upload_wrap pull-left">
                                <i class="fa fa-upload fa-2x"></i>
                                <input type="file" name="f_photo[]" accept="image/png, image/jpeg, image/jpg,image/gif">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">企业风采:</label>
                        <div class="col-lg-10">
                            <div class="upload_wrap pull-left">
                                <i class="fa fa-upload fa-2x"></i>
                                <input type="file" name="f_photo[]" accept="image/png, image/jpeg, image/jpg,image/gif">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-2">
                            <button class="btn btn-w-m btn-outline btn-primary save">保存</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>