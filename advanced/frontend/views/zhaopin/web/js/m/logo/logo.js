
//文件上传的预览效果
$(document).ready(function () {
    $("#inputs").change(function () {
        var fil = this.files;
        for (var i = 0; i < fil.length; i++) {
            reads(fil[i]);
        }
    });
});
function reads(fil){
    var reader = new FileReader();
    reader.readAsDataURL(fil);
    reader.onload = function()
    {
        document.getElementById("dd").innerHTML = "<img style='width: 70px;height: 50px' src='"+reader.result+"'>";
    };
}
////表单信息的验证
//$(document).on('click','#sub',function(){
//    var name=$('#compny_name').val();
//    if(name==''){
//        alert('公司名称不能为空');
//        return false;
//    }
//    var tel=$('#compny_tel').val();
//    if(tel==''){
//        alert('公司电话不能为空');
//        return false;
//    }
//
//})