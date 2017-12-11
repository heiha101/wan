<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

<body>
<div id="wrapper">
<form action="/web/admin/comment" method="post" enctype="multipart/form-data">
    <div class="row mg-t20 wrap_book_set">
            <div class="col-lg-12">
                <h2 class="text-center">添加评论（<?= $list['adm_name']?>）</h2>
                <div class="form-horizontal m-t">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">评论对象:</label>
                        <div class="col-lg-10">
                            <select name="com_user" class="form-control">
                                <option value="1">请选择</option>
                                <?php foreach($user as $key =>$val):?>
                                <option value="<?= $val['adm_name']?>"><?= $val['adm_name']?></option>
                           <?php endforeach?>
                            </select>
<!--                            <input type="text" class="form-control" placeholder="请输入管理员名称(这个不可改)" name="login_name" value="">-->
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">评论内容:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" placeholder="请输入评论内容" name="content">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">评论表情:</label>
                        <div class="col-lg-10">

                                <div class="upload_wrap pull-left">
                                    <i class="fa fa-upload fa-2x"></i>
                                    <input type="hidden" name="bucket" value="book" />
                                    <input type="file" name="img" accept="image/png, image/jpeg, image/jpg,image/gif">
                                </div>

                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-2">
                            <input type="hidden" name="id" value="0">
                            <input type="hidden" name="user" value="<?= $list['adm_name']?>">
                            <input type="submit" value="保存" class="btn btn-w-m btn-outline btn-primary save" id="sub">
<!--                            <button class="btn btn-w-m btn-outline btn-primary save">保存</button>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</form>
</div>
<div class="panel-heading">
    <div class="panel-options">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#tab-1" data-toggle="tab" aria-expanded="false">最新评论</a>
            </li>
        </ul>
    </div>
</div>
<div class="panel-body">
    <div class="tab-content">
        <div class="tab-pane active" id="tab-1">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>评论人</th>
                    <th>评论内容</th>
                    <th>表情</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($are as $key => $v):?>
                    <tr>
                        <td><?= $v['user']?> 评论 ：<?= $v['com_user']?></td>
                        <td><?= $v['content']?></td>
                        <td><img src="<?= $v['img']?>" style="width: 50px;height: 50px;"></td>
                    </tr>
                <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>

















