<?php /*a:1:{s:64:"C:\xampp\htdocs\ThinkPHPProject\tp\app\api\view\reset\index.html";i:1621254702;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Password Reset Page</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="format-detection" content="telephone=no">
  <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/css/login.css">
  <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
</head>
<body>
<div class="layui-container">
  <form action="" class="layui-form layui-col-md4 login-background" style="width:350px;height:300px;">
    <div class="login-header">
      <span>Reset your password</span>
    </div>
    <div class="login-header">
      <span id="email"></span>
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
        <input type="password" name="repeatPassword" placeholder="Repeat your Password again"
               autocomplete="off" class="layui-input">
      </div>
    </div>
        <input name="token" id='curToken' value="" style="display: none">
    <button class="layui-btn login-button" lay-submit="" lay-filter="reset" style="background-color:#126e82">Confirm</button>
  </form>

</div>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/reset.js"></script>
</body>
</html>