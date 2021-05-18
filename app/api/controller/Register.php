<?php


namespace app\api\controller;


use app\common\model\mysql\FrontUser;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use think\facade\Db;
use think\facade\View;
use think\response\Json;

class Register extends ApiBase
{
    public function initialize(){
//        登录之后不能再进入register页面
//        if($this->isLogin()){
//            return $this->redirect(url("/api/index/index"));
//        }
    }

    public function index(){
        return View::fetch();
    }
    public function checkRegister(): Json
    {
        if(!$this->request->isPost()){
            return show(config("status.error"),"request way wrong!");
        }
        $username = $this->request->param("username","","trim");
        $email = $this->request->param("email","","trim");
        $password = $this->request->param("password","","trim");
        $repeatPassword = $this->request->param("repeatPassword","","trim");
        $activeurl = '/ThinkPHPProject/tp/public/api/register/valRegister?token=';
        $token = $this->makeToken($email);
        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'repeatPassword' => $repeatPassword,
            'token' =>$token
        ];
        $validate = new \app\api\validate\RegisterUser();
        if(!$validate->check($data)){
            return show(config("status.error"),$validate->getError());
        }
        $frontUserObj = new \app\api\business\RegisterUser();
        $frontRes = $frontUserObj->register($data);
        if($frontRes == show(config("status.success"), "register Success!Verify Email have been sent!")) {
            $res = $this->sendEmail($email, $username, 'Activate your account', 'This is your active url: ', $activeurl, $token);
            if ($res === 0) {
                return show(config("status.error"), 'email sent failed');
            }
        }
        return $frontRes;
    }

//    public function showphp(){
//        echo phpinfo();
//    }
    public function sendEmail($email,$name,$subject,$content,$activeurl,$token,$alt='Your browser do not support html style!'){
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //服务器配置
            $mail->CharSet = "UTF-8";                     //设定邮件编码
            $mail->SMTPDebug = 0;                        // 调试模式输出
            $mail->isSMTP();                             // 使用SMTP
            $mail->Host = 'smtp.163.com';                // SMTP服务器
            $mail->SMTPAuth = true;                      // 允许 SMTP 认证
            $mail->Username = 'zhuyi403755355@163.com';                // SMTP 用户名  即邮箱的用户名
            $mail->Password = 'JYTXIAMMPFVSKJPZ';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
            $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
            $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持

            $mail->setFrom('zhuyi403755355@163.com', 'Product View Team');  //发件人
            $mail->addAddress($email, $name);  // 收件人
            //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
            $mail->addReplyTo('zhuyi403755355@163.com', 'Product View Team'); //回复的时候回复给哪个邮箱 建议和发件人一致
            //$mail->addCC('cc@example.com');                    //抄送
            //$mail->addBCC('bcc@example.com');                    //密送

            //发送附件
            // $mail->addAttachment('../xy.zip');         // 添加附件
            // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名

            //Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = $subject . time();
            $mail->Body = $content.'<a href="https://infs3202-48fbf01d.uqcloud.net/'.$activeurl.$token.'">'.$activeurl.$token.'</a>' .' Send Date:' .date('Y-m-d H:i:s');
            $mail->AltBody = $alt;

            $mail->send();
            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    public function sendForgotToken(){
        $username = $this->request->param('username','','trim');
        $email = $this->request->param('email','','trim');
        $frontUserModel = new FrontUser();
        $frontUser = $frontUserModel->getUserByUsername($username);
        if(empty($frontUser) || $frontUser['email'] !== $email){
            return show(config("status.error"), "User/Email Wrong!");
        }
        $url = '/ThinkPHPProject/tp/public/api/reset/index?token=';
        $token = $frontUser['token'];
        $this->sendEmail($email, $username,'Reset your password','This is your reset url',$url,$token);
        return show(config("status.success"), "Reset Email Has Been sent!");
    }
    //制作token
    public function makeToken($email)
    {
        $regtime = time();
        $num     = rand(0, 100);//一段随机数字
        $md5Num  = md5($regtime . $num . $email);
        $token   = base64_encode(md5($md5Num)); //创建用于激活识别码
        return $token;
    }
    public function valRegister()
    {
        if ($this->request->isGet()) {
            $token = $this->request->param("token","","trim");
            $user = DB::table('front_user')->where('status',0)->where('token',$token)->find();
            if($user){
                DB::table('front_user')->where('status',0)->where('token',$token)
                    ->update(['status'=>1]);
                echo '<h1>Verify Success! Login use your account</h1>';
            }else{
                echo '<h1>Failed, Check your email</h1>';
            }
        }
    }
}