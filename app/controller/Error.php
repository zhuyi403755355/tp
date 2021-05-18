<?php
namespace app\controller;
use think\response\Json;

class Error{
    public function __call($name,$arguments): Json
    {
        //如果模块是API模块,需要输出API的数据格式
        //如果我们是模板引擎的方式,输出错误页面
        //可以输出一个错误页面的格式
        return show(config("status.controller_not_found"),"找不到该控制器",null,404);
    }
}
