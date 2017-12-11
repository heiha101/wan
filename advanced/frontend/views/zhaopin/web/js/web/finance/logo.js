
//$(document).on('change','#sele',function(){
//    var serch=$('#sele').val();
//    var aa=$('this').attr('aa').value();
//    alert(aa);return false;
//    $.ajax({
//        type:'post',
//        url:'http://www.13zp.com/web/finance/sele',
//        data:{serch:serch},
//        success:function(res){
//            if(res==1){
//                alert("修改成功");
//            }
//
//        }
//    })
//})
$(document).on('click','#select',function(){
    var serch=$('#status').val();
    var p=1;
    count(serch,p)
})
//分页的方法
$(document).on('click','.p',function(){
    //alert(123);return false;
    var serch=$('#status').val();
    var p=$(this).val();
    //总页数
    var total=$('#total').html();
    if(p*1<1){
        p=1;
    }
    if(p*1>total){
        p=total;
    }
    count(serch,p)
})
function count(serch,p){
    $.ajax({
        type:'post',
        url:'http://www.13zp.com/web/finance/index',
        data:{serch:serch,p:p},
        dataType:'json',
        success:function(res){
          //alert(res);return false;
          var content='';
            $.each(res['info'],function(k,v){
                content+="<tr>";
                content+="<td>"+ v.comp_id+"</td>";
                content+="<td>"+ v.comp_name+"</td>";
                content+="<td>"+ v.comp_tel+"</td>";
                content+="<td><img src='http://www.13zp.com/"+ v.comp_img+"' style='width: 90px;height: 60px'/></td>";
                content+="<td>￥"+ v.comp_money+"</td>";
                content+="<td><select name='status' id='status' class='status'>";
                if(v.comp_status==0){
                    content+="<option value='0' selected>待审核</option>";
                    content+="<option value='1'>已通过</option>";
                    content+="<option value='2'>已驳回</option>";
                }
                if(v.comp_status==1){
                    content+="<option value='1'>待审核</option>";
                    content+="<option value='1' selected>已通过</option>";
                    content+="<option value='1'>已驳回</option>";
                }
                if(v.comp_status==2){
                    content+="<option value='2'>待审核</option>";
                    content+="<option value='2'>已通过</option>";
                    content+="<option value='2' selected>已驳回</option>";
                }
                content+="</select>";
                content+="</td>";
                content+="<td>";
                content+="<a  href='/web/finance/pay_info?id="+ v.id+"'>";
                content+="<i class='fa fa-eye fa-lg'></i>";
                content+="</a>";
                content+="</td>";
                content+="</tr>";
            })
           $('#tb').html(content);
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