<?php

namespace app\common\model\mysql;

use think\Model;

class AdminUser extends Model
{
    //根据用户名获取数据库表格数据
    public function getUserByUsername($username)
    {
        if (empty($username)) {
            return false;
        }
        $where = [
            "username" => trim($username),
        ];
        return $this->where($where)->find();
    }

    // 根据主键id更新数据表
    public function updateUserById($id, $data)
    {
        $id = (int)$id;
        if (empty($id) || empty($data) || !is_array($data)) {
            return false;
        }

        $where = [
            "id" => $id,
        ];

        return $this->where($where)->save($data);
    }
}