<?php


namespace app\api\business;
use app\common\model\mysql\FrontUser as FrontUserModel;

class FrontUser
{
    public function login($data){
        try {
            $frontObj = new FrontUserModel();
            $frontUser = $frontObj->getUserByUsername($data['username']);
            if (empty($frontUser)) {
                return show(config("status.error"), "Not found user");
            }
            //判断密码是否正确
            if ($frontUser['password'] !== md5($data['password'])) {
                return show(config("status.error"), "Password Wrong!");
            }
            //更新数据库表
            //填充记录信息 TODO:前端login的填充信息
//            $updateData = [
//                "last_login_time" => time(),
//                "last_login_ip" => request()->ip(),
//            ];
//            $res = $frontObj->updateUserByid($frontUser['id'], $updateData);
//            if (empty($res)) {
//                return show(config("status.error"), "Login Failed!");
//            }
        }catch(\Exception $e){
            return show(config("status.error"), "Unknown error,Login Failed!");
        }
        // TODO:如果选择记住密码则COOKIE设置为一周
        $time=empty($data['remember'])?0:3600*24*7;
        cookie(config("front.cookie_front"),$frontUser,$time); //记录cookie
        return show(config("status.success"),"Login Success!");
    }
}