<?php
use yii\widgets\LinkPager;
?>

<div id="body">
    <div id="container">
        <style>
            .pagination li{
                list-style: none;
                float: right;
                padding-left: 10px;

            }
        </style>
        <div class="sidebar">
            <a class="btn_create" href="/m/create/index">发布新职位</a>
            <dl class="company_center_aside">
                <dt>我收到的简历</dt>
                <dd>
                    <a href="/m/create/pending">待处理简历</a>
                </dd>
                <dd>
                    <a href="/m/create/have">待定简历</a>
                </dd>
                <dd>
                    <a href="/m/create/notice">已通知面试简历</a>
                </dd>
                <dd>
                    <a href="/m/create/refuse">不合适简历</a>
                </dd>
                <dd class="btm">
                    <a href="/m/create/auto">自动过滤简历</a>
                </dd>
            </dl>
            <dl class="company_center_aside">
                <dt>我发布的职位</dt>
                <dd>
                    <a href="/m/create/positions">有效职位</a>
                </dd>
                <dd>
                    <a href="/m/create/postion">已下线职位</a>
                </dd>
            </dl>
        </div><!-- end .sidebar -->
        <div class="content">
            <dl class="company_center_content">
                <dt>
                <h1>
                    <em></em>
                    有效职位 <span>（共<i style="color:#fff;font-style:normal" id="positionNumber"><?php echo $count;?></i>个）</span>                        </h1>
                </dt>
                <dd>
                    <form id="searchForm">
                        <?php foreach($command as $v) { ?>
                        <input type="hidden" value="Publish" name="type">
                        <ul class="reset my_jobs">
                            <li data-id="149594">
                                <h3>
                                    <a target="_blank" title="随便写" href="http://www.lagou.com/jobs/149594.html"><?php echo $v['postion']?></a>
                                    <span></span>
                                </h3>
                                <span class="receivedResumeNo"><a href="unHandleResumes.html?positionId=149594">应聘简历（<?php echo $v['postion_id']?>）</a></span>
                                <div><?php echo $v['nature']?> / <?php echo $v['range']?>到<?php echo $v['background']?> /<?php echo $v['requirements']?> / <?php echo $v['temptation']?></div>

                                <div class="c9">发布时间： 2014-07-01 17:07:01</div>
                                <div class="links">
                                    <a class="job_refresh" href="javascript:void(0)">刷新<span>每个职位7天内只能刷新一次</span></a>
                                    <a target="_blank" class="job_edit" href="/m/create/create?id=<?php echo $v['postion_id'];?>">编辑</a>
                                    <a class="job_offline" href="/m/create/postion?id=<?php echo $v['postion_id']?>">下线</a>
                                    <a class="job_del" href="/m/create/delete?id=<?php echo $v['postion_id']?>">删除</a>
                                </div>
                            </li>
                        </ul>
                        <?php } ?>
                    </form>
                    <span class="pagination_count" style="line-height: 20px;">共条<?= $count?>记录 |当前页<?= $num?>条</span>
                    <?php echo LinkPager::widget(['pagination' => $pages]);?>
                </dd>

            </dl>
        </div><!-- end .content -->

        <script src="style/js/job_list.min.js" type="text/javascript"></script>
        <div class="clear"></div>
        <input type="hidden" value="74fb1ce14ebf4e2495270b0fbad64704" id="resubmitToken">
        <a rel="nofollow" title="回到顶部" id="backtop"></a>
    </div><!-- end #container -->
</div><!-- end #body -->
<div id="footer">
    <div class="wrapper">
        <a rel="nofollow" target="_blank" href="about.html">联系我们</a>
        <a target="_blank" href="http://www.lagou.com/af/zhaopin.html">互联网公司导航</a>
        <a rel="nofollow" target="_blank" href="http://e.weibo.com/lagou720">拉勾微博</a>
        <a rel="nofollow" href="javascript:void(0)" class="footer_qr">拉勾微信<i></i></a>
        <div class="copyright">&copy;2013-2014 Lagou <a href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action" target="_blank">京ICP备14023790号-2</a></div>
    </div>
</div>

<script src="style/js/core.min.js" type="text/javascript"></script>
<script src="style/js/popup.min.js" type="text/javascript"></script>
<script src="style/js/tongji.js" type="text/javascript"></script>
<!--  -->
<script src="style/js/analytics01.js" type="text/javascript"></script><script type="text/javascript" src="style/js/h.js"></script>
<script type="text/javascript">
    $(function(){
        $('#noticeDot-1').hide();
        $('#noticeTip a.closeNT').click(function(){
            $(this).parent().hide();
        });
    });
    var index = Math.floor(Math.random() * 2);
    var ipArray = new Array('42.62.79.226','42.62.79.227');
    var url = "ws://" + ipArray[index] + ":18080/wsServlet?code=314873";
    var CallCenter = {
        init:function(url){
            var _websocket = new WebSocket(url);
            _websocket.onopen = function(evt) {
                console.log("Connected to WebSocket server.");
            };
            _websocket.onclose = function(evt) {
                console.log("Disconnected");
            };
            _websocket.onmessage = function(evt) {
                //alert(evt.data);
                var notice = jQuery.parseJSON(evt.data);
                if(notice.status[0] == 0){
                    $('#noticeDot-0').hide();
                    $('#noticeTip').hide();
                    $('#noticeNo').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
                    $('#noticeNoPage').text('').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
                }else{
                    $('#noticeDot-0').show();
                    $('#noticeTip strong').text(notice.status[0]);
                    $('#noticeTip').show();
                    $('#noticeNo').text('('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
                    $('#noticeNoPage').text(' ('+notice.status[0]+')').show().parent('a').attr('href',ctx+'/mycenter/delivery.html');
                }
                $('#noticeDot-1').hide();
            };
            _websocket.onerror = function(evt) {
                console.log('Error occured: ' + evt);
            };
        }
    };
    CallCenter.init(url);
</script>

<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none;"></div></div></body></html>