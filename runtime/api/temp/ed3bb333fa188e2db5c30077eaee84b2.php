<?php /*a:1:{s:65:"C:\xampp\htdocs\ThinkPHPProject\tp\app\api\view\review\index.html";i:1621312272;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/ThinkPHPProject/tp/public/static/admin/lib/layui/css/layui.css">
    <title>Title</title>
</head>
<body>
<div class="layui-row">
    <div class="layui-col-md8 layui-col-md-offset1">
        <div class="layui-panel" style="width:100%;height:80px;margin-top:40px;">
            <!--商品详情-->
            <!--            左侧缩略图-->
            <div class="layui-col-md1" style="padding:10px;">
                <img src="/ThinkPHPProject/tp/public/static/api/images/product/noimg.jpeg" id="product-img" style="width:50px;height:50px">
            </div>
            <div class="layui-col-md5" style="position:relative;display:inline-block;padding:15px;">
                <h3 id="product-name">Product Name</h3>
                <div id="test1"></div>
            </div>
        </div>
        <div class="layui-panel" style="width:100%;height:400px;margin-top:40px;margin-bottom: 40px">
            <form class="layui-form" action="" style="padding:20px">
                <div class="layui-form-item">
                    <input id="productId" name="productId" style="display: none" value="">
                    <label class="layui-form-label">Your Rate</label>
                    <div class="layui-input-block">
                        <div id="myRate"></div>
                        <input id="rateValue" name="rateValue" style="display: none" value="">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">Review Title</label>
                    <div class="layui-input-block">
                        <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="Pls enter the title" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item layui-form-text">
                    <label class="layui-form-label">Your Review</label>
                    <div class="layui-input-block">
                        <textarea name="content" placeholder="Pls enter the content" class="layui-textarea"></textarea>
                    </div>
                </div>
<!--                上传图片,不想做了-->
<!--                <div class="layui-form-item layui-form-text">-->
<!--                    <label class="layui-form-label">Upload Product Image</label>-->
<!--                    <div class="layui-input-block">-->
<!--                        <button type="button" class="layui-btn" id="test2">Upload</button>-->
<!--                        <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">-->
<!--                            Preview Img：-->
<!--                            <div class="layui-upload-list" id="demo2"></div>-->
<!--                        </blockquote>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">Submit Your Review</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="window" style="display: none">
<h3 style="padding:15px">Do you want to submit form by your ip address?</h3>
<!--<button class="layui-btn" style="margin:15px">Yes</button>-->
<!--<button class="layui-btn layui-btn-danger" style="margin:15px">Drop this form</button>-->
</div>
<script type="text/javascript" src="/ThinkPHPProject/tp/public/static/admin/lib/maintainscroll.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/layui/layui.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery-3.6.0.js"></script>
<script src="/ThinkPHPProject/tp/public/static/admin/lib/jquery/jquery.cookie.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/product.js"></script>
<script src="/ThinkPHPProject/tp/public/static/api/js/review.js"></script>
</body>
</html>