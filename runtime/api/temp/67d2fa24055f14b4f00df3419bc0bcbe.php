<?php /*a:1:{s:65:"C:\xampp\htdocs\ThinkPHPProject\tp\app\api\view\forgot\index.html";i:1621246787;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/css/login.css">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
</head>
<body>
<div class="layui-container">
    <form action="" class="layui-form layui-col-md4 login-background" style="width:350px;height: 300px;margin-top:100px">
        <div class="login-header">
            <span>Forgot Password</span><br/>
            <span style="margin-top:20px">Enter your username and email</span>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><i class="layui-icon layui-icon-username login-icon"></i></label>
            <div class="layui-input-block">
                <input type="text" name="username" placeholder="Username"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label"><i class="layui-icon layui-icon-email login-icon"></i></label>
            <div class="layui-input-block">
                <input type="text" name="email" placeholder="Email"
                       autocomplete="off" class="layui-input">
            </div>
        </div>
        <button class="layui-btn login-button" lay-submit="" lay-filter="sendForgotEmail" style="background-color:#126e82;margin-top: 20px;">Send Reset Email</button>
    </form>

</div>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/forgot.js"></script>
</body>
</html>