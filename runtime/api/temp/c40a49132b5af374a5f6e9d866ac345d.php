<?php /*a:1:{s:65:"C:\xampp\htdocs\ThinkPHPProject\tp\app\api\view\search\index.html";i:1621306907;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
    <!--    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/autocomplete/assets/js/layui/css/layui.css"/>-->
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/autocomplete/assets/css/autocomplete.css" />
    <title>Homepage</title>
</head>
<style>
    .serach-container {
        width: 310px;
        margin: 20px auto;
    }

    input {
        height: 40px;
        line-height: 40px;
        border: 1px solid #c1c1c1;
        padding: 0 5px;
        width: 300px;
        /*margin-left: 30%;*/
    }

</style>
<body>
<div class="container">
    <div class="serach-container">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 40px;">
            <legend style="text-align:center">Search Your Product</legend>
        </fieldset>
        <button class="layui-btn" style="display: inline-block;margin-left: 105%;margin-bottom:-30px" id="searchProduct">Search</button>
        <input style="margin-top:-20px" type="text" name="example1" id="productSearchInput" placeholder="Please Enter Product Name" value=""/>
        <!--    <div class="content" id="content1"></div>-->
        <!--    <button id="render" style="display: inline-block;">重新Render</button>-->
    </div>
    <!-- 商品列表横向三个竖向5-10个 -->
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 40px;margin-bottom:40px;">
        <legend style="text-align:center">Find Product List</legend>
    </fieldset>
    <div class="flow-default" style="height: 300px;" id="flow1">

    </div>
    <!--  Footer  -->
    <!--    <div class="footer">-->
    <!--        1231231123-->
    <!--    </div>-->

</div>
<script type="text/javascript" src="/ThinkPHPProject/tp/public/static/admin/lib/maintainscroll.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery.cookie.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/search.js"></script>
<script type="text/javascript">
    layui.config({
        version: false,
        debug: false,
        base: '/ThinkPHPProject/tp/public/static/admin/lib/autocomplete/assets/js/layui/extra/'
    })
</script>

<script type="text/javascript">
    layui.use(['jquery', 'autocomplete'], function () {
        var $ = layui.jquery,
            autocomplete = layui.autocomplete;

        // $('#render').on('click', function () {
        //     auto_render()
        // })

        function auto_render() {
            autocomplete.render({
                elem: $('input[name=example1]'),
                cache: true,
                url:'/ThinkPHPProject/tp/public/api/index/getProductJson',
                response: {code: 'code', data: 'data'},
                template_val: '{{d.product_name}}',
                template_txt: '{{d.product_name}} <span class=\'layui-badge layui-bg-gray\'>{{"$ "+d.product_price}}</span>',
                onselect: function (resp) {
                    // $('#content1').html("NEW RENDER: " + JSON.stringify(resp));
                    // console.log(resp['product_name']);
                    window.location = '/ThinkPHPProject/tp/public/api/product?product_id=' + resp['product_id']
                }
            })
        }

        auto_render()
    });
</script>
</body>
</html>