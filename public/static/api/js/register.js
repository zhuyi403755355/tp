layui.use(['form'], function(){
    const form = layui.form;
    const layer = layui.layer;
    form.on('submit(register)',function(data){
        data = data.field;
        // console.log(data)
        //判断输入框内容是否为空
        if(data.username === ''){
            layer.msg('Username cannot be empty');
            return false;
        }
        if(data.password === ''){
            layer.msg('Password cannot be empty');
            return false;
        }
        if(data.repeatPassword === ''){
            layer.msg('Password repeat is empty');
            return false;
        }
        //判断两次密码输入是否相同
        if(data.repeatPassword !== data.password){
            layer.msg('Password repeat not the same');
            return false;
        }
        /*
            通过Ajax请求返回登录数据
         */
        url = "/ThinkPHPProject/tp/public/api/register/checkRegister";
        $.ajax({
            url,
            data,
            type:"POST",
            success(res){
                if(res.status === 1){
                    layer.msg('Register Success!Verify Email has been sent', function () {
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