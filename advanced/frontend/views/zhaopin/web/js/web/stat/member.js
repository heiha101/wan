var count_sale_pos = {
    init:function(){
        this.eventBind();
    },
    eventBind:function(){
        $('#select').click(function(){
            count();
        })
        count();
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
                    //var x = [];
                    //var y = [];
                    //$.each(res.data,function(){
                    //    x.push(this.xValue);
                    //    y.push(parseInt(this.yValue));
                    //})
                    highcharts();

                }
            })
        }


        function highcharts(){
            var data1=[70, 69, 95, 145, 182, 215, 252,
                265, 233, 183, 139, 96];
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
    }
}
$(function(){
    count_sale_pos.init();
});