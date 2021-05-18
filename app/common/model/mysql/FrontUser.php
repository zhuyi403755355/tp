<?php

namespace app\common\model\mysql;

use think\Model;

class FrontUser extends Model
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
    //根据email获取数据库表格数据
    public function getUserByEmail($email)
    {
        if (empty($email)) {
            return false;
        }
        $where = [
            "email" => trim($email),
        ];
        return $this->where($where)->find();
    }
    //根据用户名删除数据库表格数据
    public function deleteUserByUsername($username): bool
    {
        if (empty($username)) {
            return false;
        }
        $where = [
            "username" => trim($username),
        ];
        return $this->where($where)->delete();
    }
    //根据用户ID获取数据库表格数据
    public function getUserByID($id)
    {
        if (empty($id)) {
            return false;
        }
        $where = [
            "id" => trim($id),
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
    //返回所有内容
    public function getAllUser()
    {
        return $this->select();
    }
}