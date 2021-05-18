<?php

namespace app\api\controller;

use think\facade\View;
use think\response\Json;
use app\common\model\mysql\FrontUser;

class Login extends ApiBase{
    public function initialize(){
//        登录之后不能再进入login页面
        if($this->isLogin()){
            return $this->redirect(url("/api/index/index"));
        }
    }
    public function index(){
        return View::fetch();
    }
    public function md5(){
        echo md5("123");
    }
    public function checkLogin(): Json
    {
        if(!$this->request->isPost()){
            return show(config("status.error"),"request way wrong!");
        }
        $username = $this->request->param("username","","trim");
        $password = $this->request->param("password","","trim");
        $captcha = $this->request->param("captcha","","trim");
        $remember =$this->request->param("remember","","trim");
        $data = [
            'username' => $username,
            'password' => $password,
            'captcha' => $captcha,
            'remember' => $remember
        ];
        $validate = new \app\api\validate\FrontUser();
        if(!$validate->check($data)){
            return show(config("status.error"),$validate->getError());
        }
        $frontUserObj = new \app\api\business\FrontUser();
        return $frontUserObj->login($data);
    }
}
