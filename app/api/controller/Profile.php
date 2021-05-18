<?php


namespace app\api\controller;


use think\facade\View;

class Profile extends ApiBase
{
    public function initialize()
    {
        #如果没login直接跳转index页面
        if (!$this->isLogin()) {
            return $this->redirect(url("/api/index/index"));
        }

    }

    public function index()
    {
        return View::fetch();
    }
}