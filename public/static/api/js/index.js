layui.use('carousel', function () {
    var carousel = layui.carousel;
    //建造实例
    carousel.render({
        elem: '#test1'
        , width: '100%' //设置容器宽度
        , height: '400px'
        , arrow: 'always' //始终显示箭头
        , autoplay: true
    });
});
//设置LOGIN和REGISTER显示隐藏
$('#personalButton').hide();
if ($.cookie("frontUser")) {
    $('#personalButton').show();
    $('#loginAndRegister').hide();
//替换主页用户名和头像
    let username = $.cookie("frontUser").match('"username":"(.*?)"')[1];
    $('#username').text(username);
    let avatarUrl = $.cookie("frontUser").match('"avatar":"(.*?)"');
    if (avatarUrl !== null) {
        //取到的是一个带特殊字符的,去掉\字符
        avatarUrl = avatarUrl[1];
        avatarUrl = avatarUrl.replace('"', '').replace(/[\\]/g, '')
        $('#headerAvatar').attr("src", avatarUrl);
    }
}

//退出登录
layui.use(['element', 'layer'], function () {
    const $ = layui.jquery;
    const layer = layui.layer;

    $('.login-out').on("click", function () {
        layer.msg('Logout Success!', function () {
            window.location = '/ThinkPHPProject/tp/public/api/logout/index';
        });
    });
});

layui.use('flow', function () {
    var flow = layui.flow;

    //按屏加载图片

    flow.load({
        elem: '#flow1' //流加载容器
        , done: function (page, next) { //加载下一页
            const lis = [];
            $.ajax({
                url: '/ThinkPHPProject/tp/public/api/product/getProductFlow?page=' + page,
                type: "get",
                dataType: "json",
                success: function (res) {
                    // layui.each(res, function(index, item){
                    $url1 = '/ThinkPHPProject/tp/public/api/product?product_id=' + res.product1.product_id;
                    $url2 = '/ThinkPHPProject/tp/public/api/product?product_id=' + res.product2.product_id;
                    lis.push('<div class="layui-row layui-col-space12">\n' +
                        '<a href="' + $url1 + '">' +
                        '            <div class="layui-col-md4 layui-col-md-offset2">\n' +
                        '                <div class="layui-panel">\n' +
                        '                <div style="margin:30px">\n' +
                        '<img style="width:100px;height:100px" src="' + res.product1.product_img + '">' +
                        '<h3 style="display:inline-block;padding-left:10px">' + res.product1.product_name + '</h3>' +
                        '<div style="display:inline-block;padding-left:10px">' + '$' + res.product1.product_price + '</div>' +
                        '<div style="padding-top:10px">' + 'Total ' + res.product1.comment_number + ' Comments' + '</div>' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '            </div>\n' +
                        '</a>' +
                        '<a href="' + $url2 + '">' +
                        '            <div class="layui-col-md4">\n' +
                        '                <div class="layui-panel">\n' +
                        '                <div style="margin:30px">\n' +
                        '<img style="width:100px;height:100px" src="' + res.product2.product_img + '">' +
                        '<h3 style="display:inline-block;padding-left:10px">' + res.product2.product_name + '</h3>' +
                        '<div style="display:inline-block;padding-left:10px">' + '$' + res.product2.product_price + '</div>' +
                        '<div style="padding-top:10px">' + 'Total ' + res.product2.comment_number + ' Comments' + '</div>' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '            </div>\n' +
                        '</a>' +
                        '        </div>');
                    // });
                    // console.log($url1)
                    next(lis.join(''), page < 6);
                }
            })
            // lis.push('<div style="margin:30px">'+ $item1 +'</div>');
            // $.get('/ThinkPHPProject/tp/public/api/product/getProductFlow?page='+page,function (res){
            //     $item1 = res.product1;
            //     console.log($item1)
            // });
        }
    });
});


layui.use('form', function () {
    var form = layui.form;

    //监听提交
    form.on('submit(formDemo)', function (data) {
        layer.msg(JSON.stringify(data.field));
        return false;
    });
});

$("#searchProduct").click(function () {
    // console.log($("#productSearchInput").val());
    const $searchItem = $("#productSearchInput")
    if ($searchItem.val() === '') {
        layer.msg('Search empty item!');
    }else{
        window.location = '/ThinkPHPProject/tp/public/api/search?product_name=' + $searchItem.val();
    }
});

$('#productSearchInput').keydown(function (event) {
    if (event.keyCode === 13) {
        const $searchItem = $("#productSearchInput")
        if ($searchItem.val() === '') {
            layer.msg('Search empty item!');
        }else{
            window.location = '/ThinkPHPProject/tp/public/api/search?product_name=' + $searchItem.val();
        }
    }
});