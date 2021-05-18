<?php


namespace app\api\controller;


use think\facade\Db;
use think\facade\View;

class Reset extends ApiBase
{
    public function index()
    {
        return View::fetch();
    }
    public function resetPwd(){
        if(!$this->request->isPost()){
            return show(config("status.error"),"request way wrong!");
        }
        $password = $this->request->param("password","","trim");
        $repeatPassword = $this->request->param("repeatPassword","","trim");
        $token = $this->request->param("token","","trim");
        $validate = new \app\api\validate\ResetPwd();
        $data = [
            'password' => $password,
            'repeatPassword' => $repeatPassword,
            'token' =>$token
        ];
        if(!$validate->check($data)){
            return show(config("status.error"),$validate->getError());
        }
        $user = DB::table('front_user')->where('status',1)->where('token',$token)->find();
        if($user){
            if($user['password'] === md5($password)){
                return show(config("status.error"),'same password as before!');
            }
            DB::table('front_user')->where('status',1)->where('token',$token)
                ->update(['password'=>md5($password)]);
            return show(config("status.success"),'reset successfully');
        }
        return show(config("status.error"),'email have not validate or token wrong');
    }
}