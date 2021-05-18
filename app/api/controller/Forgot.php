<?php


namespace app\api\controller;



use think\facade\View;

class Forgot extends ApiBase
{
    public function index(){
        return View::fetch();
    }

}