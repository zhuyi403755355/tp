<?php


namespace app\api\controller;


use app\common\model\mysql\Comment;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\Db;
use think\facade\View;

class Product extends ApiBase
{

    public function initialize()
    {

        parent::initialize();
//        $id = $this->request->param("product_id","","trim");
//        echo $id;
//        if($id === "1"){
//            echo"不是1";
//        }

    }

    public function index()
    {
        return View::fetch();
    }

    public function getProductInfo()
    {
        $product = Db::table('product')->where('product_id', $this->request->param("product_id", "", "trim"))->find();

        return json($product);
    }

    public function getProductFlow(): \think\response\Json
    {
        $page = $this->request->param("page", "", "trim");
        $product1 = Db::table('product')->where('product_id', $page * 2 - 1)->find();
        $product2 = Db::table('product')->where('product_id', $page * 2)->find();
        $data = [
            "product1" => $product1,
            "product2" => $product2
        ];
        return json($data);
    }

    public function getProductFlowByName(): \think\response\Json
    {
        $name = $this->request->param("name", "", "trim");
        $data = Db::table('product')->where('product_name','like', '%'.$name.'%')->select();
//        $product1 = Db::table('product')->where('product_id', $page * 2 - 1)->find();
//        $product2 = Db::table('product')->where('product_id', $page * 2)->find();
//        $data = [
//            "product1" => $product1,
//            "product2" => $product2
//        ];
        return json($data);
    }


    public function getCommentFlow()
    {
        $productId = $this->request->param("product_id", "", "trim");
        $commentModel = new Comment();
        return $commentModel->getAllComments($productId);
    }
}