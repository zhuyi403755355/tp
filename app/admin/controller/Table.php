<?php

namespace app\admin\controller;

use app\BaseController;
use app\common\model\mysql\FrontUser;
use think\Model;
use think\response\Json;

class Table extends BaseController
{
    public function getUserTable(): Json
    {

        $frontUser = new FrontUser();
        $userdata = $frontUser->getAllUser();
        $json = [];
        foreach ($userdata as $user) {
            $json[] = ["id" => $user->id,
                "username" => $user->username,
                "sex" => $user->sex === 2 ? "male" : ($user->sex === 1 ? "female" : "secret"),
                "email" => $user->email,
                "status" => $user->status === 1 ? "Good" : "Error",
                "phone" => $user->phone_number
            ];
        }
        $data = json([
            "success" => true,
            "code" => 0,
            "msg" => "",
            "count" => 1,
            "data" => $json
        ]);
        return $data;
    }

    public function checkDeleteUser(): ?Json
    {
        if(!$this->request->isPost()){
            return show(config("status.error"),"request way wrong!");
        }
        $username = $this->request->param("username","","trim");
        $frontUserObj = new FrontUser();
        $res = $frontUserObj->deleteUserByUsername($username);
        if (empty($res)) {
            return show(config("status.error"), "Fail Delete beause username");
        }
        return show(config("status.success"),"Delete Success!");
    }
}