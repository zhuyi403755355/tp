layui.use(['element', 'layer', 'table','form'], function () {
    const $ = layui.jquery;
    const layer = layui.layer;
    const table = layui.table;
    const form = layui.form;
    $('.login-out').on("click", function () {
        console.log("123");
        layer.msg('Logout Success!', function () {
            window.location = '/ThinkPHPProject/tp/public/admin/logout/index';
        });
    });
    table.on('toolbar(userTable)', function (obj) {
        if (obj.event === 'add') {
            layer.open({
                skin: 'layui-layer-lan'
                , type: 1
                , title: ['Add User', 'font-size:18px;']
                , closeBtn: 1 // 是否显示关闭按钮
                , anim: 1 //动画类型
                , area: ['440px', '350px']
                , content: $('#window'),
                cancel: function(layero,index){
                    window.parent.location.reload();
                }
            });
        }
    });
    table.on('tool(userTable)', function (obj) {
        var data = obj.data;
        if (obj.event === 'del') {
            console.log(data);
            url = "/ThinkPHPProject/tp/public/admin/table/checkDeleteUser";
            $.ajax({
                url,
                data,
                type: "POST",
                success(res) {
                    if (res.status === 1) {
                        layer.msg('Delete Success!');
                        window.parent.location.reload();
                    } else {
                        layer.msg(res.message);
                        return false;
                    }
                }
            });
            return false;
        }
    });
    form.on('submit(register)',function(data){
        data = data.field;
        console.log(data)
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
                    layer.msg('Add User Success!', function () {
                        window.parent.location.reload();
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