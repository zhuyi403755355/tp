<?php /*a:1:{s:66:"C:\xampp\htdocs\ThinkPHPProject\tp\app\api\view\product\index.html";i:1621310002;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
    <title>Product Page</title>
</head>
<body>
<!--<ul class="layui-nav" lay-filter="">-->
<!--    <li class="layui-nav-item" style="margin-left: 20%"><a href="/ThinkPHPProject/tp/public/api/index"><img-->
<!--            src="/ThinkPHPProject/tp/public/static/api/images/logo.png" style="width: 90px;height: 40px"></a></li>-->
<!--    &lt;!&ndash;    <li class="layui-nav-item"><input type="text" name="search" required lay-verify="required" placeholder="Search the item" autocomplete="off" class="layui-input" style="width: 250px"></li>&ndash;&gt;-->
<!--    <div class="user_status_shower" id="loginAndRegister" style="display: inline-block;">-->
<!--        <a href="/ThinkPHPProject/tp/public/api/login">-->
<!--            <button class="layui-btn" style="margin-left:60px;">Login</button>-->
<!--        </a>-->
<!--        <a href="/ThinkPHPProject/tp/public/api/register">-->
<!--            <button class="layui-btn">Register</button>-->
<!--        </a>-->
<!--    </div>-->
<!--    <li class="layui-nav-item" id="personalButton" style="margin-left: 80px;">-->
<!--        <a><img src="//t.cn/RCzsdCq" class="layui-nav-img" id="headerAvatar"><label id="username">Username</label></a>-->
<!--        <dl class="layui-nav-child">-->
<!--            <dd><a href="/ThinkPHPProject/tp/public/api/profile">My Profile</a></dd>-->
<!--            <dd><a href="javascript:" class="login-out">Log out</a></dd>-->
<!--        </dl>-->
<!--    </li>-->
<!--</ul>-->
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
<!--商品面板-->
<div class="layui-row">
    <div class="layui-col-md10 layui-col-md-offset1">
        <div class="layui-panel" style="width:100%;height:300px;margin-top:40px;">
            <!--商品详情-->
            <!--            左侧缩略图-->
            <div class="layui-col-md3" style="padding:60px;">
                <img src="/ThinkPHPProject/tp/public/static/api/images/product/noimg.jpeg" id="product-img"
                     style="width:180px;height:180px">
            </div>
            <div class="layui-col-md5" style="position:relative;display:inline-block;padding:60px;">
                <h1 id="product-name">Product Name</h1>
                <h2 id="product-price" style="color:red;margin-top:10px">$Price</h2>
                <div id="test1"></div>
                <div>Total views: <h3 style="display:inline-block" id="viewNumber"> -1</h3></div>
                <a id="jumpToReview" href="#">
                    <button class="layui-btn" style="margin-top:20px">Write a Review</button>

                </a>
                <!--                <button class="layui-btn layui-btn-warm" style="margin-top:20px">Add to Cart</button>-->
            </div>
        </div>
        <!--        <div class="layui-panel" style="width:80%;height:200px;padding:20px;margin-top:20px">-->
        <h1 style="margin: 20px">Reviews</h1>

        <!--        </div>-->
        <!--        <div class="layui-panel" style="width:80%;height:200px;margin-top:20px;margin-bottom: 20px">-->

        <!--        </div>-->
        <div class="flow-default" id="flowComment">
            <div class="layui-panel" id="noComment" style="width:80%;height:50px;padding:20px;margin-top: 20px">
                <h3 style="margin: 20px">No comment yet</h3>
            </div>
            <!--            <div class="layui-panel" style="width:80%;height:250px;margin-top:20px;padding:20px;margin-bottom:40px">-->
            <!--                <img src="//t.cn/RCzsdCq" class="layui-nav-img" style="width:50px;height:50px">-->
            <!--                    <label style="display: inline-block;font-size:12px">My User name</label>-->
            <!--                </a>-->
            <!--                <div style="display: block;margin-left: 10px"id="commentRate"></div>-->
            <!--                <script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>-->
            <!--                <script>-->
            <!--                    layui.use('rate', function () {-->
            <!--                        var rate = layui.rate;-->
            <!--                        //渲染-->
            <!--                        var ins1 = rate.render({-->
            <!--                            elem: '#commentRate'  //绑定元素-->
            <!--                            , theme: '#009688'-->
            <!--                            , readonly: true-->
            <!--                            , half: true-->
            <!--                            , text: true-->
            <!--                            , value: 1-->
            <!--                            , setText: function (value) {-->
            <!--                                var arrs = {-->
            <!--                                    '0':'no comment'-->
            <!--                                    ,'0.5':'impossible bad'-->
            <!--                                    ,'1': 'very bad'-->
            <!--                                    , '1.5': 'bad'-->
            <!--                                    , '2': 'little bad'-->
            <!--                                    , '2.5': 'not really bad'-->
            <!--                                    , '3': 'just so so'-->
            <!--                                    , '3.5': 'slightly good'-->
            <!--                                    , '4': 'good'-->
            <!--                                    , '4.5': 'really good'-->
            <!--                                    , '5': 'excellent'-->
            <!--                                };-->
            <!--                                this.span.text(arrs[value] || (value));-->
            <!--                            }-->
            <!--                        });-->
            <!--                    });</script>-->
            <!--                <h3 style="margin-top:10px;margin-left: 10px">Comment Title</h3>-->
            <!--                <p style="margin-top:10px;margin-left: 10px"> Commont Content</p>-->
            <!--            </div>-->
        </div>
    </div>
</div>
<script type="text/javascript" src="/ThinkPHPProject/tp/public/static/admin/lib/maintainscroll.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery.cookie.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/product.js"></script>
</body>
</html>