<?php /*a:1:{s:66:"C:\xampp\htdocs\ThinkPHPProject\tp\app\admin\view\login\index.html";i:1619251960;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Back-end Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/css/login.css">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
</head>
<body>
<div class="layui-container">
    <form action="" class="layui-form layui-col-md4 login-background" style="width:350px;height: 300px;">
        <div class="login-header">
            <span>Backend Login</span>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><i class="layui-icon layui-icon-username login-icon"></i></label>
            <div class="layui-input-block">
                <input type="text" name="username" placeholder="Username"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><i class="layui-icon layui-icon-password login-icon"></i></label>
            <div class="layui-input-block">
                <input type="password" name="password" placeholder="Password"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <input type="text" name="captcha" placeholder="Verification code"
                       autocomplete="off" class="layui-input">
                <div class = "login-captcha"><img src="/ThinkPHPProject/tp/public/admin/verify/index" onclick="this.src='/ThinkPHPProject/tp/public/admin/verify/index?'+Math.random();"></div>
            </div>
        </div>
        <button class="layui-btn login-button" lay-submit="" lay-filter="login" style="background-color:#126e82">Login</button>
    </form>

</div>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/js/login.js"></script>
</body>
</html>