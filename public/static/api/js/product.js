//封装一个获取URL中get参数的方法
(function ($) {
    $.extend({
        /**
         * url get parameters
         * @public
         * @return array()
         */
        urlGet: function () {
            var aQuery = window.location.href.split("?");//取得Get参数
            var aGET = new Array();
            if (aQuery.length > 1) {
                var aBuf = aQuery[1].split("&");
                for (var i = 0, iLoop = aBuf.length; i < iLoop; i++) {
                    var aTmp = aBuf[i].split("=");//分离key与Value
                    aGET[aTmp[0]] = aTmp[1];
                }
            }
            return aGET;
        },
    });
})(jQuery);
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

$curProductid = $.urlGet(window.location.href)['product_id'];
//获取当前页面所有数据
$.ajax({
    url:'/ThinkPHPProject/tp/public/api/product/getProductInfo?product_id='+$curProductid,
    type:"get",
    dataType:"json",
    success:function(res) {
        if(res!=null){
            // console.log(res);
            $('#product-name').text(res.product_name);
            $('#product-price').text('$ '+res.product_price);
            $('#viewNumber').text(res.comment_number);
            $('#product-img').attr('src',res.product_img)
            $('#jumpToReview').attr('href','/ThinkPHPProject/tp/public/api/review?product_id='+res.product_id);
            layui.use('rate', function () {
                var rate = layui.rate;

                //渲染
                var ins1 = rate.render({
                    elem: '#test1'  //绑定元素
                    , theme: '#009688'
                    , readonly: true
                    , half: true
                    , text: true
                    , value: res.avg_rating
                    , setText: function (value) {
                        var arrs = {
                            '0':'no comment'
                            ,'0.5':'impossible bad'
                            ,'1': 'very bad'
                            , '1.5': 'bad'
                            , '2': 'little bad'
                            , '2.5': 'not really bad'
                            , '3': 'just so so'
                            , '3.5': 'slightly good'
                            , '4': 'good'
                            , '4.5': 'really good'
                            , '5': 'excellent'
                        };
                        this.span.text(arrs[value] || (value));
                    }
                });
            });
        }
    }
})

layui.use('flow', function () {
    var flow = layui.flow;

    // 按屏加载图片

    flow.load({
        elem: '#flowComment' //流加载容器
        ,isAuto: false
        ,done: function(page, next){ //加载下一页
            const lis = [];
            $.ajax({
                url:'/ThinkPHPProject/tp/public/api/product/getCommentFlow?product_id='+$curProductid,
                type:"get",
                dataType:"json",
                success:function(res){
                    // console.log("curProductid"+$curProductid)
                    // console.log(res.length);
                    // console.log(page);
                    if(res.length!==0){
                        // next(lis.join(''), page < 3);
                    // }else {
                    //     console.log(res[page-1].comment_title);
                        $('#noComment').attr("style", 'display: none');
                        lis.push('            <div class="layui-panel" style="width:80%;height:250px;margin-top:20px;padding:20px;margin-bottom:40px">\n' +
                            '                <img src="'+res[page-1].user_avatar+'" class="layui-nav-img" style="width:50px;height:50px">\n' +
                            '                    <label style="display: inline-block;font-size:12px">'+res[page-1].username+'</label>\n' +
                            '                </a>\n' +
                            '                <div style="display: block;margin-left: 10px"id="commentRate'+page+'"></div>\n' +
                            // '                <script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>\n' +
                            '                <script>\n' +
                            '                    layui.use(\'rate\', function () {\n' +
                            '                        var rate = layui.rate;\n' +
                            '                        //渲染\n' +
                            '                        var ins1 = rate.render({\n' +
                            '                            elem: \'#commentRate'+page+'\'  //绑定元素\n' +
                            '                            , theme: \'#009688\'\n' +
                            '                            , readonly: true\n' +
                            '                            , half: true\n' +
                            '                            , text: true\n' +
                            '                            , value: '+res[page-1].rate_number+'\n' +
                            '                            , setText: function (value) {\n' +
                            '                                var arrs = {\n' +
                            '                                    \'0\':\'no comment\'\n' +
                            '                                    ,\'0.5\':\'impossible bad\'\n' +
                            '                                    ,\'1\': \'very bad\'\n' +
                            '                                    , \'1.5\': \'bad\'\n' +
                            '                                    , \'2\': \'little bad\'\n' +
                            '                                    , \'2.5\': \'not really bad\'\n' +
                            '                                    , \'3\': \'just so so\'\n' +
                            '                                    , \'3.5\': \'slightly good\'\n' +
                            '                                    , \'4\': \'good\'\n' +
                            '                                    , \'4.5\': \'really good\'\n' +
                            '                                    , \'5\': \'excellent\'\n' +
                            '                                };\n' +
                            '                                this.span.text(arrs[value] || (value));\n' +
                            '                            }\n' +
                            '                        });\n' +
                            '                    });</script>\n' +
                            '                <h3 style="margin-top:10px;margin-left: 10px">'+res[page-1].comment_title+'</h3>\n' +
                            '                <p style="margin-top:10px;margin-left: 10px"> '+res[page-1].comment_content+'</p>\n' +
                            '            </div>')
                    }
                    next(lis.join(''), page < res.length);

                }
            })
        }
    });
});