<?php
namespace app\api\middleware;

class Auth{
    public function handle($request,\Closure $next){
        //前置中间件
        return $next($request);
        //后置中间件

    }

    //中间件结束
    public function end(\think\Response $response){

    }

}
