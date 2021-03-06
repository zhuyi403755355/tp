<?php /*a:1:{s:64:"C:\xampp\htdocs\ThinkPHPProject\tp\app\api\view\login\index.html";i:1621246275;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>User Login</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/css/login.css">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
</head>
<body>
<div class="layui-container">
    <form action="" class="layui-form layui-col-md4 login-background" style="width:350px;height: 400px;margin-top:60px">
        <div class="login-header">
            <span>User Login</span>
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
                <div class = "login-captcha"><img src="/ThinkPHPProject/tp/public/api/verify/index" onclick="this.src='/ThinkPHPProject/tp/public/api/verify/index?'+Math.random();"></div>
            </div>
        </div>
        <div class="layui-form-item" style="margin-left:30px;">
            <label class="layui-form-label">Remember</label>
            <input type="checkbox" name="remember" lay-skin="switch">
        </div>
        <button class="layui-btn login-button" lay-submit="" lay-filter="login" style="background-color:#126e82;margin-bottom: 20px;">Login</button>
        <label style="padding-left:50px;">Do not have Account? <a href="/ThinkPHPProject/tp/public/api/register/index" style="color:red;">Register</a></label>
        <label style="display: block;padding-left:50px;padding-top:10px">Forgot your password? <a href="/ThinkPHPProject/tp/public/api/forgot/index" style="color:red;">Click Here</a></label>
    </form>

</div>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/login.js"></script>
</body>
</html>