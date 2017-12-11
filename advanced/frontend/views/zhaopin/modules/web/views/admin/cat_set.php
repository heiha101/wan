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
<div id="wrapper">
        <div class="row  border-bottom">
            <div class="col-lg-12">
                <div class="tab_title">
                    <ul class="nav nav-pills">
                        <li  >
                            <a href="/web/book/index">图书列表</a>
                        </li>
                        <li  class="current"  >
                            <a href="/web/book/cat">分类列表</a>
                        </li>
                        <li  >
                            <a href="/web/book/images">图片资源</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row m-t  wrap_cat_set">
            <div class="col-lg-12">
                <h2 class="text-center">分类设置</h2>
                <div class="form-horizontal m-t m-b">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">分类名称:</label>
                        <div class="col-lg-10">
                            <input type="text" name="name" class="form-control" placeholder="请输入分类名称~~" value="互联网">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">权重:</label>
                        <div class="col-lg-10">
                            <input type="text" name="weight" class="form-control" placeholder="请输入分类名称~~" value="1">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-lg-4 col-lg-offset-2">
                            <input type="hidden" name="id" value="2">
                            <button class="btn btn-w-m btn-outline btn-primary save">保存</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
</html>
