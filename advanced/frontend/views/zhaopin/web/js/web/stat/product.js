
$(document).on('click','#select',function(){
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
    }
    count(start_time,end_time,1);
})
//分页的ajsx方法
$(document).on('click','.p',function(){
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
    }
    var p=$(this).val();
    //总页数
    var total=$('#total').html();
    if(p*1<1){
        p=1;
    }
    if(p*1>total){
        p=total;
    }
    count(start_time,end_time,p)
})
function count(start_time,end_time,p){
    //alert(start_time);return;
    $.ajax({
        type:'post',
        url:'http://www.13zp.com/web/stat/index',
        data:{start_time:start_time,end_time:end_time,p:p},
        dataType:'json',
        success:function(res){
            //alert(res);return false;
            var content='';
            $.each(res.info,function(k,v){
                content+="<tr>";
                content+="<td>"+ v.u_name+"</td>";
                content+="<td>"+ v.u_tel+"</td>";
                content+="<td>";
                if(v.u_gender==1){
                    content+="男";
                }
                if(v.u_gender==2){
                    content+="女";
                }
                if(v.u_gender==0){
                    content+="保密";
                }
                content+="</td>";
                content+="<td>"+ v.u_email+"</td>";
                content+="<td>"+ v.create_time+"</td>";
                content+="</tr>";
            })
            $('.fen').html(content);
            var page='';
            page+="<button class='p' value='1'>首页</button>";
            page+="<button class='p' value='"+ res.pages.lastPage+"'>上一页</button>";
            page+="<button class='p' value='"+res.pages.nextPage+"'>下一页</button>";
            page+="<button class='p' value='"+res.pages.total_page+"'>尾页</button>";
            $('#pa').html(page);
            $('#p').html(res.pages.p);
            $('#total').html(res.pages.total_page);
        }
    })
}
