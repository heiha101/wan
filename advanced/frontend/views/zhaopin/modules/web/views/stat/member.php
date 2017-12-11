<?php
use \app\common\services\StaticService;
//StaticService::includeJs('/js/web/stat/member.js',\app\assets\WebAsset::className());
StaticService::includeJs('/js/web/stat/jquery.min.js',\app\assets\WebAsset::className());
StaticService::includeJs('/js/web/stat/highcharts.js',\app\assets\WebAsset::className());
StaticService::includeJs('/assets/My97DatePicker/WdatePicker.js',\app\assets\WebAsset::className());
?>
<body>
    <div class="row  border-bottom">
        <div class="col-lg-12">
            <div class="tab_title">
                <ul class="nav nav-pills">
                    <li>
                        <a href="/web/stat/index">新增会员</a>
                    </li>
                    <li>
                        <a href="/web/stat/product">新增公司用户</a>
                    </li>
                    <li  class="current">
                        <a href="/web/stat/member">销售额统计</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row m-t">
        <div class="col-lg-12 m-t">
            <form class="form-inline" id="search_form_wrap">
                <div class="row p-w-m">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" placeholder="请选择开始时间" name="date_from" class="form-control" id="start_time" value="" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy'})">
                        </div>
                    </div>
                    <div class="form-group m-r m-l">
                        <label>至</label>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" placeholder="请选择结束时间" name="date_to" class="form-control" value="" id="end_time" onFocus="WdatePicker({lang:'zh-cn',dateFmt:'yyyy'})">
                        </div>
                    </div>
                    <div class="form-group">
                        <a class="btn btn-w-m btn-outline btn-primary search" id="select">搜索</a>
                    </div>
                </div>
                <hr/>
            </form>
    </div>
    </div>
    <div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
    <script language="JavaScript">
        $(document).ready(function() {
            $('#select').click(function(){
                count();
            })
            function count(){
                var start_time = $('#start_time').val();
                var end_time   = $('#end_time').val();
                if(start_time=='' && end_time!=''){
                    alert("请输入开始时间");return;
                }
                if(end_time=='' && start_time!=''){
                    alert("请输入结束时间");return;
                }
                if(end_time!=''){
                    if(start_time>end_time){
                        alert("查询时间区间不正确");return;
                    }
                    if(end_time-start_time>1){
                        alert("请查询一年内的数据");return;
                    }
                }
                $.ajax({
                    type:'post',
                    url:'http://www.13zp.com/web/stat/member',
                    data:{start_time:start_time,end_time:end_time},
                    dataType:'json',
                    success:function(res){
                        //alert(res);return false;  //$v['sum(comp_money)']
                        highcharts(res);
                    }
                })
            }
            function highcharts(res){
               //alert(res);return false;
                   for($i=0;$i<=11;$i++){
                       if(res[$i]){
                           res[$i]=parseInt(res[$i])
                       }
                       if(res[$i]==null){
                           res[$i]=0;
                       }
                   }
                //console.log(res)
               //alert(res);return false;
                var data1=[res['0'], res['1'], res['2'], res['3'], res['4'], res['5'], res['6'],
                    res['7'], res['8'], res['9'], res['10'], res['11']];
                var data2=[12, 8, 57, 113, 170, 220, 248,
                    241, 201, 141, 86, 25];
                var title = {
                    text: '月平均营业额'
                };
                var subtitle = {
                    text: 'Source: runoob.com'
                };
                var xAxis = {
                    categories: ['一月', '二月', '三月', '四月', '五月', '六月'
                        ,'七月', '八月', '九月', '十月', '十一月', '十二月']
                };
                var yAxis = {
                    title: {
                        text: 'Temperature (\xB0C)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                };
                var tooltip = {
                    valueSuffix: '\xB0C'
                }

                var legend = {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                };
                var series =  [
                    {
                        name: '广告位营业额',
                        data: data1
                    },
                    {
                        name: '发布职位营业额',
                        data: data2
                    },
                ];
                var json = {};
                //alert(json);return false;
                json.title = title;
                json.subtitle = subtitle;
                json.xAxis = xAxis;
                json.yAxis = yAxis;
                json.tooltip = tooltip;
                json.legend = legend;
                json.series = series;
                $('#container').highcharts(json);
            }
        });
    </script>
</body>
</html>
