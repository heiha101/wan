/**
 * Created by asus on 2017/9/14.
 */

$(document).ready(function(e) {
    $('.register_radio li input').click(function(e){
        $(this).parent('li').addClass('current').append('<em></em>').siblings().removeClass('current').find('em').remove();

    })
})
$('#submitLogin').click(function(){
    var url=$('.current').children('input').val();
    if(url=='' || url==undefined){
        alert('请选择入口')
        return false;
    }
})

    $(function(){
        //验证表单
        $("#loginForm").validate({
            /* onkeyup: false,
             focusCleanup:true, */
            rules: {
                u_email: {
                    required: true,
                    u_email: true
                },
                password: {
                    required: true,
                    rangelength: [5,16]
                }
            },
            messages: {
                u_email: {
                    required: "请输入登录邮箱地址",
                    u_email: "请输入有效的邮箱地址，如：vivi@lagou.com"
                },
                u_pwd: {
                    required: "请输入密码"
                }
            },
            submitHandler:function(form){
                if($('#remember').prop("checked")){
                    $('#remember').val(1);
                }else{
                    $('#remember').val(null);
                }
                var u_email = $('#u_email').val();
                var u_pwd = $('#u_pwd').val();
                var remember = $('#remember').val();

                var callback = $('#callback').val();
                var authType = $('#authType').val();
                var signature = $('#signature').val();
                var timestamp = $('#timestamp').val();

                $(form).find(":submit").attr("disabled", true);
                $.ajax({
                    type:'POST',
                    data:{u_email:u_email,u_pwd:u_pwd,autoLogin:remember, callback:callback, authType:authType, signature:signature, timestamp:timestamp},
                    url:ctx+'/user/login.json'
                }).done(function(result) {
                    if(result.success){
                        if(result.content.loginToUrl){
                            window.location.href=result.content.loginToUrl;
                        }else{
                            window.location.href=ctx+'/';
                        }
                    }else{
                        $('#beError').text(result.msg).show();
                    }
                    $(form).find(":submit").attr("disabled", false);
                });
            }
        });
    })
