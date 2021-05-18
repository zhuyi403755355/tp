<?php
namespace app\admin\controller;

class Logout extends AdminBase{
    public function index(){
        //清除cookie
        cookie(config("admin.cookie_admin"),null);
        return redirect(url("/admin/login/index"));
    }
}
