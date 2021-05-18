<?php
namespace app\api\validate;

use think\Validate;

class FrontUser extends Validate{
    protected $rule = [
      'username' => 'require',
      'password' => 'require',
      'captcha' => 'require|checkCaptcha',
    ];

    protected $message = [
        'username' => 'require username',
        'password' => 'require password',
        'captcha' => 'require captcha',
    ];

    protected function checkCaptcha($value,$rule,$data=[]){
        if(!captcha_check($value)){
            return "validate code wrong";
        }
        return true;
    }
}
