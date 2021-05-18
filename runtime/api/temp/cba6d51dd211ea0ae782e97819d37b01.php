<?php /*a:1:{s:66:"C:\xampp\htdocs\ThinkPHPProject\tp\app\api\view\profile\index.html";i:1621255832;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/api/css/profile.css">
    <title>BackEnd Homepage</title>
</head>
<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header">
        <ul class="layui-nav layui-layout-right">
            <li class="layui-nav-item">
                <a href="javascript:" class="show-cookies"><img src="//t.cn/RCzsdCq" class="layui-nav-img" id="headerAvatar"> <label
                        id='username'>frontUser</label></a>
                <dl class="layui-nav-child">
                    <dd><a href="/ThinkPHPProject/tp/public/api/index/index">Homepage</a></dd>
                    <dd><a href="javascript:" class="login-out">Log out</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="layui-panel profile-container">
        <div class="layui-tab">
            <ul class="layui-tab-title">
                <li class="layui-this">User Profile</li>
                <li>User Setting</li>
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item layui-show">
                    <form class="layui-form" action="">
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <h2>Avatar</h2>
                            </label>
                            <div class="layui-input-block">
                                <img src="//t.cn/RCzsdCq" style="width:60px;height:60px;border-radius:2px;" id="avatarPreview">
                                <input type="image" name="AvatarUrl" id="avatarUrl" src="" value="" />
                                <div class="layui-upload-drag" id="uploadImg" name="file">
                                    <i class="layui-icon" style="font-size:24px;"></i>
                                    <p>Clik Or Drag File Here</p>
                                </div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <h2>Username</h2>
                            </label>
                            <div class="layui-input-block">
                                <input type="text" name="username"
                                       placeholder="Username" autocomplete="off" class="layui-input"
                                       id="form-username"
                                       style="margin-left: 20px;width:20%;">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                <h2>Sex</h2>
                            </label>
                            <div class="layui-input-block">
                                <input type="radio" name="sex" value="1" title="female" id="female-check">
                                <input type="radio" name="sex" value="2" title="male" id="male-check">
                                <input type="radio" name="sex" value="0" title="secret" id="secret-check" checked>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button class="layui-btn" lay-submit lay-filter="saveChanges">Save Changes</button>
                                <button type="reset" class="layui-btn layui-btn-primary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="layui-tab-item">
                    <h3 style="margin-left:20px">Your Email Verify Status</h3>
                    <span class="layui-badge" id="emailStatus" style="font-size:16px;margin:20px">Not Verified</span>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery.cookie.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/profile.js"></script>
</body>
</html>