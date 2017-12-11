<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>管理后台</title>
    <link href="/css/web/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/web/style.css?ver=20170401" rel="stylesheet"></head>

<body>
<form action="<?=\app\common\services\Urlservice::buildWebUrl('/cate/cate_add')?>" method="post">
<div id="wrapper">
<div class="row m-t  wrap_brand_set">
            <div class="col-lg-12">
                <h2 class="text-center">分类添加</h2>
                <div class="form-horizontal m-t m-b">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">分类名称:</label>
                        <div class="col-lg-10">
                            <input type="text" name="cate_name" class="form-control" placeholder="请输入分类名称" value=""  style="width: 200px">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">顶级分类:</label>
                        <div class="col-lg-10">
                            <select name="parent_id" class="form-control" style="width: 200px">
                                <option value="0">--顶级分类--</option>
                                <?php foreach ($res as $key => $v) : ?>
                                    <option value="<?= $v['job_cate_id']?>" style="margin-left:<?= $v['level']?>px"><?= $v['job_cate_name']?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">分类排序:</label>
                        <div class="col-lg-10">
                            <input type="text" name="cate_sort" class="form-control" placeholder=""  value="100"  style="width: 200px">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-2">
<!--                            <button class="btn btn-w-m btn-outline btn-primary save">保存</button>-->
                            <input type="submit" class="btn btn-w-m btn-outline btn-primary save" value="保存"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</form>
</body>
</html>


