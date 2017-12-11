$(function(){
    $.each($('tr[data-pid=0]'),function(k,v){
        var cate=$(v).data('id');
        if($('tr[data-pid="'+cate+'"]').length==0){
            $('tr[data-id="'+cate+'"]').find('.open-child').html('');
        }
    })
})
//展开
$('table').on('click','.open-child',function(){
//获取当前操作tr里的id
    var cate_id=$(this).parents('tr').data('id');
//把data-pid等于cate_id的时候给他加个class
    $('tr[data-pid="'+cate_id+'"]').removeClass();

    $.each($('tr[data-pid="'+cate_id+'"]'),function(k,v){
        var cate=$(v).data('id');
        if($('tr[data-pid="'+cate+'"]').length==0){
            $('tr[data-id="'+cate+'"]').find('.open-child').html('');
        }
    });
//把当前操作的html替换成 ’收起‘ 把class属性值改为 close-child
    $(this).html('收起').attr('class','close-child');



})
//收起
$('table').on('click','.close-child',function(){
//获取当前操作tr里的id
    var cate_id=$(this).parents('tr').data('id');
//把当前操作的html替换成 ‘展开’ 把class属性值改为 open-child
    $(this).html('展开').attr('class','open-child');
//调用递归方法
    cate_hide(cate_id);
})

//分类隐藏递归方法
function cate_hide(pid){
//循环tr里面data-pid等于传过来的id 所有的数据
    $('tr[data-pid="'+pid+'"]').each(function(k,v){
//给当前的tr加一个class  把自己隐藏起来
        $(v).addClass('tr-none');
//获取当前tr里面 data-id 值
        cate_id=$(v).data('id');
//把class等于close-child html替换成’展开‘,把class属性值改为 open-child
        $(v).find('.close-child').html('展开').attr('class','open-child');

        var child=$('tr[data-pid="'+pid+'"]');
//判断  如果分类下面没有子集就给他return false；

        if(child.length<0){
            return false;
        }
//调用自己
        cate_hide(cate_id)
    })
}