/**
 * Created by cxcv4549 on 2017/9/5.
 */

$(document).on('click','.search',function(){
    var status=$('#status').val();
    var mix_kw=$('#mix_kw').val();
    if(status=='' && mix_kw==''){
       return false;
    }
    $(this).submit();
})
$(document).on('change','.status',function(){
    var c_id=$(this).next().val()
    var status=$(this).val();
    $.ajax({
        url:"/web/company/up-status",
        type:'post',
        data:'c_id='+c_id+'&status='+status,
        success:function(msg){
            if(msg==0){
                alert('修改失败')
            }
        }
    })
})