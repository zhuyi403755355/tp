<?php

namespace app\api\controller;

use app\BaseController;
use think\exception\HttpResponseException;

class ApiBase extends BaseController{
    public $frontUser = null;
    public function initialize(){

        parent::initialize();
        //登录逻辑 没有中间件的情况下判断是否登录
//        if(empty($this->isLogin())){
//            return $this -> redirect(url("/admin/login/index"),302);
//        }


    }

    public function isLogin(){
       $this->frontUser = cookie(config("front.cookie_front"));
       if(empty($this->frontUser)){
           return false;
       }
       return true;
    }

    public function redirect(...$args){
        throw new HttpResponseException(redirect(...$args));
    }
}