<?php


namespace app\admin\business;
use app\common\model\mysql\AdminUser as AdminUserModel;

class AdminUser
{
    public function login($data){
        try {
            $adminObject = new AdminUserModel();
            $adminUser = $adminObject->getUserByUsername($data['username']);
            if (empty($adminUser) || $adminUser->status !== config("status.mysql.table_nomal")) {
                return show(config("status.error"), "Not found user");
            }
            //判断密码是否正确
            if ($adminUser['password'] !== md5($data['password'])) {
                return show(config("status.error"), "Password Wrong!");
            }
            //更新数据库表
            //填充记录信息
            $updateData = [
                "last_login_time" => time(),
                "last_login_ip" => request()->ip(),
            ];
            $res = $adminObject->updateUserByid($adminUser['id'], $updateData);
            if (empty($res)) {
                return show(config("status.error"), "Login Failed!");
            }
        }catch(\Exception $e){
            return show(config("status.error"), "Unknown error,Login Failed!");
        }
        cookie(config("admin.cookie_admin"),$adminUser); //记录cookie
        return show(config("status.success"),"Login Success!");
    }
}