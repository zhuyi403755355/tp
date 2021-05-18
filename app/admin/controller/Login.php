<?php

namespace app\admin\controller;

use think\facade\View;
use think\response\Json;
use app\common\model\mysql\Product;

class Login extends AdminBase{
    public function initialize(){
        if($this->isLogin()){
            return $this->redirect(url("/admin/index/index"));
        }
    }
    public function index(){
        return View::fetch();
    }
    public function md5(){
        dump(cookie(config("admin.cookie_admin")));
        echo md5("admin");
    }
    public function checkLogin(): Json
    {
        if(!$this->request->isPost()){
            return show(config("status.error"),"request way wrong!");
        }
        $username = $this->request->param("username","","trim");
        $password = $this->request->param("password","","trim");
        $captcha = $this->request->param("captcha","","trim");
        $data = [
            'username' => $username,
            'password' => $password,
            'captcha' => $captcha
        ];
        //判断输入值是否为空
//        if(empty($username) || empty($password) || empty($captcha)){
//        }
        $validate = new \app\admin\validate\AdminUser();
        if(!$validate->check($data)){
            return show(config("status.error"),$validate->getError());
        }
//        //校验验证码
//        if(!captcha_check($captcha)){
//            //失败
//            return show(config("status.error"),"Verication code Wrong");
//        }
        $adminUserObj = new \app\admin\business\AdminUser();
        return $adminUserObj->login($data);
    }
}
