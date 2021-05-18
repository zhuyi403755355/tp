<?php


namespace app\common\model\mysql;
use think\Model;

class Comment extends Model
{
//
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
//    //根据用户ID获取数据库表格数据
//    public function getUserByID($id)
//    {
//        if (empty($id)) {
//            return false;
//        }
//        $where = [
//            "id" => trim($id),
//        ];
//        return $this->where($where)->find();
//    }
//
//     根据主键id更新数据表
    public function updateComment($data)
    {

        return $this->save($data);

    }
    //返回所有内容
    public function getAllComments($productId)
    {
        return $this->where('product_id', $productId)->select();
    }
}