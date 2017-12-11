<?php
use app\common\services\Urlservice;
?>

<body>
<div id="wrapper">
        <div class="row  border-bottom">
            <div class="col-lg-12">
                <div class="tab_title">
                    <ul class="nav nav-pills">
                       <!-- <li  class="current"  >
                            <a href="/web/brand/info">会员中心</a>
                        </li>-->
                        <li  >
                            <a href="/web/brand/images">个人简历</a>
                        </li>
                        <li  >
                            <a href="/web/brand/wanted">求职管理</a>
                        </li>
                        <li  >
                            <a href="/web/brand/images">收藏&关注</a>
                        </li>
                        <li  >
                            <a href="/web/brand/images">账号管理</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><div class="row m-t">
            <div class="col-lg-9 col-lg-offset-2 m-t">
                <dl class="dl-horizontal">
                    <dt>品牌名称</dt>
                    <dd>08D招聘</dd>
                    <dt>品牌Logo</dt>
                    <dd>
                        <img class="img-circle circle-border" src="<?= Urlservice::buildWwwUrl('/images/web/1.jpg')?>" width="300px" style="width: 100px;height: 100px;"/>
                    </dd>

                    <dt>联系电话</dt>
                    <dd>12113021774</dd>
                    <dt>地址</dt>
                    <dd>上海徐汇区宜山路810号8号楼创嘉站201 （贝岭电子大厦院内）</dd>
                    <dt>品牌介绍</dt>
                    <dd>我店是知名的综合性网上购物商城，由国内著名出版机构科文公司、美国老虎基金、美国IDG集团、卢森堡剑桥集团、亚洲创业投资基金（原名软银中国创业基金）共同投资成立。</dd>
                    <dd>
                        <a href="/web/brand/set" class="btn btn-outline btn-primary btn-w-m">编辑</a>
                    </dd>
                </dl>
            </div>
</div>
</body>
