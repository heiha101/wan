/**
 * Created by cxcv4549 on 2017/9/20.
 */
$(document).on('click','.search',function(){
    var status=$('#statusw').val();
    var job_cate_id=$('#job_cate_id').val();
    if(status=='' && job_cate_id==''){
        return false;
    }
    $(this).submit();
})
$(document).on('change','#status',function(){
    var postion_id=$(this).next().val()
    var status=$(this).val();
    $.ajax({
        url:"/web/company/uppos",
        type:'post',
        data:'postion_id='+postion_id+'&status='+status,
        success:function(msg){
            if(msg==0){
                alert('修改失败')
            }
        }
    })
})