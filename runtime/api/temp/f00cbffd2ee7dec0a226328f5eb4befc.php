<?php /*a:1:{s:64:"C:\xampp\htdocs\ThinkPHPProject\tp\app\api\view\index\index.html";i:1621310376;}*/ ?>
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

    /*.content {*/
    /*    margin-top: 15px;*/
    /*    padding: 10px;*/
    /*    border: 1px solid #ddd;*/
    /*    overflow: hidden;*/
    /*    word-break: break-all;*/
    /*}*/
</style>
<body>
<div class="container">
    <ul class="layui-nav" style="padding:10px"lay-bar="disabled">
    <li class="layui-nav-item"  style="margin-top: -10px"><a href="/ThinkPHPProject/tp/public/api/index"><img src="/ThinkPHPProject/tp/public/static/api/images/logo.png" style="width: 90px;height: 40px"></a></li>
<!--        <li  style="display:inline-block;">-->
<!--            <input type="text" name="search" required lay-verify="required" placeholder="Search the item" autocomplete="off" class="layui-input" style="width: 250px">-->
<!--            <div class="layui-form-item">-->
<!--                <div class="layui-inline layui-form" style="width:240px;margin-right: 0;margin-bottom:0px">-->
<!--                    <select name="modules" lay-verify="required" lay-search="" id="test_user"  lay-filter="test_user" >-->
<!--                        <option value="">Choose or type in items</option>-->
<!--                    </select>-->
<!--                </div>-->
<!--            </div>-->

<!--        </li>-->
<!--        <li class="layui-nav-item">-->
<!--            <a href="javascript:;">Browse Categories</a>-->
<!--            <dl class="layui-nav-child">-->
<!--                <dd><a href="">Laptop</a></dd>-->
<!--                <dd><a href="">Phone</a></dd>-->
<!--            </dl>-->
<!--        </li>-->
        <div class="user_status_shower layui-layout-right" id = "loginAndRegister" style="display: inline-block;padding-top:15px;padding-right:10px ">
            <a href="/ThinkPHPProject/tp/public/api/login"><button class="layui-btn" style="margin-left:60px;">Login</button></a>
            <a href="/ThinkPHPProject/tp/public/api/register"><button class="layui-btn">Register</button></a>
        </div>
        <li class="layui-nav-item layui-layout-right" id = "personalButton" style="margin-left: 80px;">
            <a><img src="//t.cn/RCzsdCq" class="layui-nav-img" id = "headerAvatar"><label id = "username">Username</label></a>
            <dl class="layui-nav-child">
                <dd><a href="/ThinkPHPProject/tp/public/api/profile">My Profile</a></dd>
                <dd><a href="javascript:" class="login-out">Log out</a></dd>
            </dl>
        </li>
    </ul>
    <div class="serach-container">
        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 40px;">
            <legend style="text-align:center">Search Your Product</legend>
        </fieldset>
        <button class="layui-btn" style="display: inline-block;margin-left: 105%;margin-bottom:-30px" id="searchProduct">Search</button>
        <input style="margin-top:-20px" type="text" name="example1" id="productSearchInput" placeholder="Please Enter Product Name" value=""/>
        <!--    <div class="content" id="content1"></div>-->
        <!--    <button id="render" style="display: inline-block;">重新Render</button>-->
    </div>
    <div class="layui-carousel" id="test1">
        <div carousel-item>
            <div><img src="/ThinkPHPProject/tp/public/static/api/images/carousel1.jpg" style="height:500px"></div>
                <div><img src="/ThinkPHPProject/tp/public/static/api/images/carousel2.jpg" style="height:500px"></div>
                    <div><img src="/ThinkPHPProject/tp/public/static/api/images/carousel3.jpg" style="height:600px"></div>
        </div>
    </div>
    <!-- 商品列表横向三个竖向5-10个 -->
    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 40px;margin-bottom:40px;">
        <legend style="text-align:center">Hot Product List</legend>
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
<script src="/ThinkPHPProject/tp/public/static/api/js/index.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/autoLogout.js"></script>
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