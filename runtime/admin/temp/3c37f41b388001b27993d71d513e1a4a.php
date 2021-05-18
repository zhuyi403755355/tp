<?php /*a:1:{s:66:"C:\xampp\htdocs\ThinkPHPProject\tp\app\admin\view\index\index.html";i:1621319802;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
    <title>BackEnd Homepage</title>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href=""><img src="//t.cn/RCzsdCq" class="layui-nav-img"> Admin </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:" class="login-out">Log out</a></dd>
                </dl>
            </li>
        </ul>
    </div>
</div>
<ul class="layui-nav layui-nav-tree layui-nav-side">
    <li class="layui-nav-item layui-nav-itemed" style="margin-top:100px">
        <a href="javascript:;">Management</a>
        <dl class="layui-nav-child">
            <dd><a href="javascript:;">User Management</a></dd>
<!--            <dd><a href="javascript:;">Product Management</a></dd>-->
        </dl>
    </li>
</ul>
<div class="layui-card" style="width:75%; height:75%;position:absolute;left:20%;top:20%;">
<table class="layui-table" lay-data="{height:400, page:{layout:['count','prev','page','next','limit']},url:'/ThinkPHPProject/tp/public/admin/table/getUserTable', id:'userTable',toolbar: '#toolbarHead'}" lay-filter="userTable">
    <thead>
    <tr>
        <th lay-data="{field:'id',width:80, sort: true}">ID</th>
        <th lay-data="{field:'username'}">Username</th>
        <th lay-data="{field:'sex',width:80,  sort: true}">Sex</th>
        <th lay-data="{field:'email'}">Email</th>
        <th lay-data="{field:'status',width:80}">Status</th>
        <th lay-data="{field:'phone',width:150}">Phone Number</th>
        <th lay-data="{fixed: 'right',width:100, title:'Control', toolbar: '#barRow'}"></th>
    </tr>
    </thead>
</table>
</div>

<form action="" class="layui-form layui-col-md4" style="margin-top:20px;width:350px;display: none;" id="window">
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
    <button class="layui-btn" lay-submit="" lay-filter="register" style="background-color:#126e82;margin-left: 110px">Submit</button>
    <button class="layui-btn" style="background-color:#73aeae">Cancel</button>
</form>

<script type="text/html" id="toolbarHead">
    <div class="layui-btn-container">
        <a class="layui-btn layui-btn-xs" lay-event="add">Add User</a>
    </div>
</script>
<script type="text/html" id="barRow">
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">Delete</a>
</script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/js/index.js"></script>
</body>
</html>