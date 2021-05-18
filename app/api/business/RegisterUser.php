<?php


namespace app\api\business;
use app\common\model\mysql\FrontUser as FrontUserModel;

class RegisterUser
{
    public function register($data)
    {
        try {
            $frontObj = new FrontUserModel();
            $frontUser = $frontObj->getUserByUsername($data['username']);
            $frontUserGetByEmail = $frontObj->getUserByEmail($data['email']);
            if (empty($frontUser) && empty($frontUserGetByEmail)) { //更新数据库表
                $userData = [
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'password' => md5($data['password']),
                    'token' =>$data['token'],
                    'status' => config('status.mysql.table_pedding')
                ];
                $frontObj->save($userData);
                $userId = $frontObj->id; //获取此用户的ID
            }
//            if (!empty($frontUser) || $frontUser->status !== config("status.mysql.table_nomal")) {
            else{
                return show(config("status.error"), "User/Email Exists!");
            }

        } catch (\Exception $e) {
            return show(config("status.error"), "Unknown error,Register Failed!");
        }
//        cookie(config("front.cookie_front"),$frontUser); //记录cookie
        return show(config("status.success"), "register Success!Verify Email have been sent!");
    }

}