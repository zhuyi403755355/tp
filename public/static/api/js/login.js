layui.use(['form'], function(){
    const form = layui.form;
    const layer = layui.layer;
    form.on('submit(login)',function(data){
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
        if(data.captcha === ''){
            layer.msg('Verification Code cannot be empty');
            return false;
        }
        /*
            通过Ajax请求返回登录数据
         */
        url = "/ThinkPHPProject/tp/public/api/login/checkLogin";
        $.ajax({
            url,
            data,
            type:"POST",
            success(res){
                if(res.status === 1){
                    layer.msg('Login Success!', function () {
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
