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
$curProductName = $.urlGet(window.location.href)['product_name'];
if($curProductName!==''){
    layui.use('flow', function () {
        var flow = layui.flow;

        //按屏加载图片

        flow.load({
            elem: '#flow1' //流加载容器
            , done: function (page, next) { //加载下一页
                const lis = [];
                $.ajax({
                    url: '/ThinkPHPProject/tp/public/api/product/getProductFlowByName?name=' + $curProductName,
                    type: "get",
                    dataType: "json",
                    success: function (res) {
                        layui.each(res, function(index, item){
                        $url = '/ThinkPHPProject/tp/public/api/product?product_id=' + item.product_id;
                        lis.push('<div class="layui-row layui-col-space12">\n' +
                            '<a href="' + $url + '">' +
                            '            <div class="layui-col-md4 layui-col-md-offset4">\n' +
                            '                <div class="layui-panel">\n' +
                            '                <div style="margin:30px">\n' +
                            '<img style="width:100px;height:100px" src="' + item.product_img + '">' +
                            '<h3 style="display:inline-block;padding-left:10px">' + item.product_name + '</h3>' +
                            '<div style="display:inline-block;padding-left:10px">' + '$' + item.product_price + '</div>' +
                            '<div style="padding-top:10px">' + 'Total ' + item.comment_number + ' Comments' + '</div>' +
                            '                </div>\n' +
                            '            </div>\n' +
                            '            </div>\n' +
                            '</a>' +
                            '        </div>');
                            // console.log(index);
                            // console.log(item);

                        });
                        next(lis.join(''), page < 1);
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
}else{
    console.log(1);
}

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