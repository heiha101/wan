$(document).on('click','#savet',function(){
    var f_name=$('#f_names').val();
    var f_introduce=$('#f_introduces').val();
    var url=$(this).data('content');
    var data='f_name='+f_name+'&f_introduce='+f_introduce;
    savetext(url,data);

})

function savetext(url,data){
    $.ajax({
        url:url,
        data:data,
        type:'post',
        dataType:'json',
        success:function(msg){
            if(msg==0){
                alert('保存失败');
                return false;
            }
            $('#f_name').text(msg.f_name);
            $('#f_name').prop('title',msg.f_name);
            $('#f_names').val(msg.f_name);
            $('#f_introduce').text(msg.f_introduce);
            $('#f_introduces').val(msg.f_introduce);
            $('#cancelDetail').trigger('click');
        }
    })

}
$(document).on('click','#saveLabels',function(){
    var lab_strs='';
    $('#hasLabels li').each(function(i,v){
      var a=$(v).children('span').html()+',';
       lab_strs+=a;
    })
    if(lab_strs=='') {
        alert('`空`的`不`能`提`交`');
        return false;
    }
    var url=$('#boon_url').val();
    $.ajax({
        url:url,
        data:'boon_str='+lab_strs,
        dataType:'json',
        type:'post',
        success:function(msg){
            if(msg==0){
                alert('添加失败');
                return false;
            }
            var aa='';
            for(var i=0;i<msg.length;i++){
                aa+='<li><span id="'+msg[i].boon_id+'">'+msg[i].boon_name+'</span></li>';
            }
            aa+='<li class="link">编辑</li>';
            $('#hasLabels').html(aa);
            $('#cancelLabels').trigger('click');
        }
    })
})
$('#hasLabels li').on('click','i',function(){
   var boon_id=$(this).prev().prop('id');
    if(boon_id==undefined){
        return false;
    }
    var url=$('#boon_del_url').val();
    $.ajax({
        url:url,
        data:'boon_id='+boon_id,
        dataType:'json',
        type:'post',
        success:function(msg){
            if(msg==0){
                alert('删除失败');
                return false;
            }
        }
    })
})