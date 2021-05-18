//替换用户页数据
// console.log($.cookie("frontUser"))
let username = $.cookie("frontUser").match('"username":"(.*?)"')[1];
let sex = $.cookie("frontUser").match('"sex":(.*?),')[1];
let status = $.cookie("frontUser").match('"status":(.*?),')[1];
let avatarUrl;
if ($.cookie("frontUser").match('"avatar":"(.*?)"') == null) {
    avatarUrl = '//t.cn/RCzsdCq'
} else {
    avatarUrl = $.cookie("frontUser").match('"avatar":"(.*?)"')[1];
}
//取到的是一个带特殊字符的,去掉\字符
avatarUrl = avatarUrl.replace('"', '').replace(/[\\]/g, '')
if (avatarUrl !== "") {
    // alert(avatarUrl);
    // alert($.cookie("frontUser"));
    $('#headerAvatar').attr("src", avatarUrl);
    $('#avatarPreview').attr("src", avatarUrl);
    $('#avatarUrl').attr('value', avatarUrl);
    if(status==='1') {
        $('#emailStatus').addClass('layui-bg-green').text('Verified');
    }
}
$('#username').text(username);
$('#form-username').attr({"placeholder": username, "value": username});
if (sex === "1") {
    $("#female-check").attr('checked', 'true');
} else if (sex === "2") {
    $("#male-check").attr('checked', 'true');
}


layui.use(['element', 'layer', 'upload', 'form'], function () {
    const $ = layui.jquery;
    const layer = layui.layer;
    const element = layui.element;
    $('.login-out').on("click", function () {
        layer.msg('Logout Success!', function () {
            window.location = '/ThinkPHPProject/tp/public/api/logout/index';
        });
    });

    //TODO:上传图片
    const upload = layui.upload;
    var uploadInst = upload.render({
        elem: '#uploadImg',
        url: '/ThinkPHPProject/tp/public/api/ProfileForm/uploadImg',
        before: function(obj){
        //预读本地文件示例，不支持ie8
        obj.preview(function(index, file, result){
            $('#avatarPreview').attr('src', result); //图片链接（base64）
        });
        }
        ,done: function (res) {
            //TODO:先不要在结束时搞图片预览
            if (res !== null) {
                // layer.msg(res.message);
                // window.location = '/ThinkPHPProject/tp/public/api/profile/index';
                // $('#avatarPreview').attr('src', res.message);
                $('#avatarUrl').attr('value', res.message);
            } else {
                alert("Wrong!!!");
            }
        },
        error: function () {
            //请求一次
        }
        , accept: 'file' //允许上传的文件类型
        , size: 50 //最大允许上传的文件大小
    });
    //TODO:提交表单
    const form = layui.form;
    form.on('submit(saveChanges)', function (data) {
        data = data.field;
        console.log(data);
        url = "/ThinkPHPProject/tp/public/api/ProfileForm/checkForm";
        $.ajax({
            url,
            data,
            type: "POST",
            success(res) {
                if (res.status === 1) {
                    layer.msg('Save Success!');
                    // window.location = '/ThinkPHPProject/tp/public/api/profile/index';
                } else {
                    layer.msg(res.message);
                    return false;
                }
            }
        });
        return false;
    })

});


