<?php
namespace app\admin\middleware;

class Auth{
    public function handle($request,\Closure $next){
        //前置中间件
        //当Cookie没有登录状态时,涉及到后台页面全部redirect
        if(empty(cookie(config("admin.cookie_admin"))) && !preg_match("/login/",$request->pathinfo()) && !preg_match("/verify/",$request->pathinfo())){
            return redirect((string) url("/admin/login/index"));
        }
        return $next($request);
        //后置中间件

    }

    //中间件结束
    public function end(\think\Response $response){

    }

}
