<?php

namespace app\admin\controller;

use app\BaseController;
use think\exception\HttpResponseException;

class AdminBase extends BaseController{
    public $adminUser = null;
    public function initialize(){

        parent::initialize();
        //登录逻辑 没有中间件的情况下判断是否登录
//        if(empty($this->isLogin())){
//            return $this -> redirect(url("/admin/login/index"),302);
//        }
    }

    public function isLogin(){
       $this->adminUser = cookie(config("admin.cookie_admin"));
       if(empty($this->adminUser)){
           return false;
       }
       return true;
    }

    public function redirect(...$args){
        throw new HttpResponseException(redirect(...$args));
    }
}