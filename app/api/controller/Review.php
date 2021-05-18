<?php

namespace app\api\controller;

use app\common\model\mysql\Comment;
use app\common\model\mysql\Product;
use think\facade\Db;
use think\facade\View;
use think\facade\Request;

class Review extends ApiBase
{

    public function index()
    {
        return View::fetch();
    }

    function get_client_ip($type = 0, $adv = false)
    {
        $type = $type ? 1 : 0;
        static $ip = NULL;
        if ($ip !== NULL) return $ip[$type];
        if ($adv) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos = array_search('unknown', $arr);
                if (false !== $pos) unset($arr[$pos]);
                $ip = trim($arr[0]);
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u", ip2long($ip));
        $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
//    public function getname(){
//        preg_match('/"username":"(.*?)",/', cookie('frontUser'), $match);
//        dump($match[1]);
//    }

    public function submitReview()
    {   //TODO:如果有cookie则用用户名,没有cookie则使用IP地址

        if (cookie("frontUser")) {
            $pregValue = preg_match('/"username":"(.*?)",/', cookie('frontUser'), $match);
            $gregValue2 = preg_match('/"avatar":"(.*?)",/', cookie('frontUser'), $match2);
            $username = $match[1];
            $avatar = $match2[1];
            $avatar = str_replace(array('"', '\\'), '', $avatar);

        } else {
            $username = $this->get_client_ip(0, true);
            $avatar = '//t.cn/RCzsdCq';
        }

        $title = $this->request->param("title", "", "trim");
        $content = $this->request->param("content", "", "trim");
        $rate = $this->request->param("rateValue", "", "trim");
        if ($rate === null) {
            $rate = 0;
        }
        $productId = $this->request->param("productId", "", "trim");
        if($productId===null){
            return show(config("status.error"), 'please access right page');
        }
        $data = [
            'username' => $username,
            'user_avatar' => $avatar,
            'product_id' => $productId,
            'comment_title' => $title,
            'comment_content' => $content,
            'rate_number' => $rate
        ];
        $comment = new Comment();
        $productModel = new Product();
        $productData = $productModel->getProductByID($productId);
        $updateProductData = [
            'product_id' => $productId,
            'product_name' => $productData['product_name'],
            'product_price' => $productData['product_price'],
            'comment_number' => $productData['comment_number']+1,
            'avg_rating' => ceil(($productData['avg_rating']*$productData['comment_number'] + $rate)/($productData['comment_number']+1))
        ];
        $productModel->updateProductById($productId,$updateProductData);
//        $productData = $productModel->getProductByID($productId);

         $comment->updateComment($data);
        return show(config("status.success"),$updateProductData);
    }

}