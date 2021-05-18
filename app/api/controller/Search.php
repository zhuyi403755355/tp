<?php


namespace app\api\controller;


use think\facade\View;

class Search extends ApiBase
{
    public function index()
    {
        return View::fetch();
    }

}