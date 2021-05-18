<?php
namespace app\api\controller;

class Logout extends ApiBase{
    public function index(){
        //清除cookie
        cookie(config("front.cookie_front"),null);
        return redirect(url("/api/login/index"));
    }
}
