<?php


namespace app\api\controller;


use think\facade\Db;
use think\facade\View;

class Index extends ApiBase
{
    public function index()
    {
        return View::fetch();
    }

    public function getProductJson()
    {
        $data = Db::table('product')->select();
        $res = [
            'code' => 0,
            'data' => $data,
            'msg' => ''
        ];
//        dump(json($res));
        return json($res);
    }
}

//{
//    "code": 0,
//  "data": [{
//    "id": "2",
//    "consignee": "test",
//    "phone_number": "18079775521",
//    "address": "test"
//  }, {
//    "id": "3",
//    "consignee": "zzzzzzzz1",
//    "phone_number": "18079775321",
//    "address": "test"
//  }, {
//    "id": "4",
//    "consignee": "fffffffffffffff",
//    "phone_number": "15078977897"
//  }, {
//    "id": "5",
//    "consignee": "te",
//    "phone_number": "18079175321",
//    "address": "dsa"
//  }, {
//    "id": "6",
//    "consignee": "zzzffff",
//    "phone_number": "18079775511",
//    "address": "dsadas"
//  }],
//  "msg": ""
//}