var count_order_pos = {
    init:function(){
        this.eventBind();
    },
    eventBind:function(){
        count();
        $('.select').click(function(){
            count();
        })
        function count(){
            var start_time = $('#date_start').val();
            var end_time   = $('#date_end').val();
            var url = $('.select').data('url');
            var status = $('#status').val();
            var keyword = $('#keyword').val();
            if(end_time!=''){
                if(start_time>end_time){
                    alert("查询时间区间不正确");return;
                }
            }
            $.ajax({
                type:'post',
                url:url,
                data:{start_time:start_time,end_time:end_time,status:status,keyword:keyword},
                dataType:'json',
                success:function(res){
                    var x = [];
                    var y = [];
                    $.each(res.data,function(){
                        x.push(this.xValue);
                        y.push(parseInt(this.yValue));
                    })
                    highcharts(x,y);

                }
            })
        }
        function highcharts(x,y){
            $('#lineChart').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: ''
                },
                subtitle: {
                    text: ''
                },
                xAxis: {
                    categories: x
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '个'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} 个</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: '订单数量',
                    data: y
                } ]
            });
        }
    }
}
$(function(){
    count_order_pos.init();

});
