layui.use(['form'], function(){
    const form = layui.form;
    const layer = layui.layer;
    form.on('submit(sendForgotEmail)',function(data){
        data = data.field;
        console.log(data)
        //判断输入框内容是否为空
        if(data.username === ''){
            layer.msg('Username cannot be empty');
            return false;
        }
        if(data.email === ''){
            layer.msg('Email cannot be empty');
            return false;
        }
        url = "/ThinkPHPProject/tp/public/api/register/sendForgotToken";
        $.ajax({
            url,
            data,
            type:"POST",
            success(res){
                if(res.status === 1){
                    layer.msg('Reset Email Send!', function () {
                        window.location = '/ThinkPHPProject/tp/public/api/index/index';
                    });
                }else{
                    layer.msg(res.message);
                    return false;
                }
            }
        })
        return false;
    })
});