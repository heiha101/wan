/**
 * Created by cxcv4549 on 2017/9/6.
 */
$(function(){
    var val=$('#preview').prop('src');
    if(val=='http://www.13zp.com/'){
        $('#preview').hide();
        $('#del_img').hide();
    }
})
function setImagePreview(avalue) {
    var docObj=document.getElementById("doc");
    var imgObjPreview=document.getElementById("preview");
    if(docObj.files &&docObj.files[0]){
        imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
    }else{
        docObj.select();
        var imgSrc = document.selection.createRange().text;
        var localImagId = document.getElementById("localImag");
        try{
            localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
            localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
        }
        catch(e){
            alert("您上传的图片格式不正确，请重新选择!");
            return false;
        }
        imgObjPreview.style.display = 'none';
        document.selection.empty();
    }
    return true;
    }
    $(document).on('click','#del_img',function(){
        $(this).hide();
        $('#preview').hide();
        $('#doc').val('');
    })
    $(document).on('change','#doc',function(){
        $('#preview').show();
        $('#del_img').show();
    })
    $(document).on('click','.cate',function(){
        $(this).removeClass('cate');
        $(this).children('span').removeClass('text_b');
        $(this).addClass('industy');
        return false;
    })
    $(document).on('click','.industy',function(){
        $(this).removeClass('industy');
        $(this).children('span').addClass('text_b');
        $(this).addClass('cate');
        return false;
    })
    $('.save').on('click',function(){
        var str='';
        $('.cate').each(function(){
            str+=$(this).data('id')+',';
        })
        $('#b_id').val(str);
    })
