<?php

namespace app\admin\controller;

use think\captcha\facade\Captcha;

/*
 * 创建验证码图片
 */
class Verify{
    public function index(){
        return Captcha::create('myverify');
    }
}