<?php

namespace app\common\model\mysql;

use think\Model;

class Product extends Model
{
    //根据用户名获取数据库表格数据
    public function getProductByName($productName)
    {
        if (empty($productName)) {
            return false;
        }
        $where = [
            "product_name" => trim($productName),
        ];
        return $this->where($where)->find();
    }
//    //根据用户名删除数据库表格数据
//    public function deleteUserByUsername($username): bool
//    {
//        if (empty($username)) {
//            return false;
//        }
//        $where = [
//            "username" => trim($username),
//        ];
//        return $this->where($where)->delete();
//    }
    //根据用户ID获取数据库表格数据
    public function getProductByID($id)
    {
        if (empty($id)) {
            return false;
        }
        $where = [
            "product_id" => trim($id),
        ];
        return $this->where($where)->find();
    }
//
    public function updateProductById($id, $data)
    {
        $where = [
            "product_id" => $id,
        ];

        return $this->where($where)->save($data);
    }
//    //返回所有内容
//    public function getAllUser()
//    {
//        return $this->select();
//    }
}