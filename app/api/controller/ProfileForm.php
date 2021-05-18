<?php

namespace app\api\controller;

use app\common\model\mysql\FrontUser;
use think\response\Json;
use think\Image;

class ProfileForm extends ApiBase
{
    public function uploadImg()
    {
        #TODO:上传的文件路径放入数据库Avatar,根据cookie
        $file = $this->request->file('file');
        if ($file) {
//            $frontUser = new FrontUser();
            $pregValue = preg_match('/"id":(.*?),/', cookie('frontUser'), $match);
            $id = $match[1];
            $savename = \think\facade\Filesystem::disk('public')->putFileAs('api/images/'."id".$id, $file,"avatar.jpg");

            $savename = '/ThinkPHPProject/tp/public/static/' . $savename;
            //TODO:考虑在这一步先移除数据库更新
//            $data = ["avatar" => $savename];
//            $res = $frontUser->updateUserById($id, $data);
//            if (empty($res)) {
//                return show(config("status.success"), "Fail Upload beause cookie/userid");
//            }
        }
        return show(config("status.success"), $savename);
    }

    public function checkForm(): Json
    {
        if(!$this->request->isPost()){
            return show(config("status.error"),"request way wrong!");
        }

        $username = $this->request->param("username","","trim");
        $AvatarUrl = $this->request->param("AvatarUrl","","trim");
        $sex = $this->request->param("sex","","trim");
        //暂时只支持全require
        if($username===""){
            $data = [
                'avatar' => $AvatarUrl,
                'sex' => $sex
            ];
        }else {
            $data = [
                'username' => $username,
                'avatar' => $AvatarUrl,
                'sex' => $sex
            ];
        }

        //TODO:Validate 一下

        //更新数据库
        $frontUserObj = new FrontUser();
        $pregValue = preg_match('/"id":(.*?),/', cookie('frontUser'), $match);
        $id = $match[1];
        $res = $frontUserObj->updateUserById($id, $data);
        if (empty($res)) {
            return show(config("status.error"), "Fail Upload beause cookie/userid");
        }
        //更新Cookie ,TODO:这里未设置cookie,默认更改数据后不记住用户
        $frontUser = $frontUserObj->getUserByID($id);
        cookie("frontUser",$frontUser,0);
        return show(config("status.success"), "From upload Correct!");
    }
}