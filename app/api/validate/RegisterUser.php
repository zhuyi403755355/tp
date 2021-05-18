<?php

namespace app\api\validate;

use think\Validate;

class RegisterUser extends Validate
{
    protected $rule = [
        'username' => 'require|alphaNum',
        'email' => 'require|email',
        'password' => 'require|alphaNum|checkPasswordStrength',
        'repeatPassword' => 'require|confirm:password',
    ];

    protected $message = [
        'username.require' => 'require username',
        'username,alphaNum' => 'Username have invalid characters',
        'password.require' => 'require password',
        'password.alphaNum' => 'illegal password',
        'repeatPassword.require' => 'require repeatPassword',
        'repeatPassword' => 'repeat password not the same as password',
    ];

    protected function checkPasswordStrength($value, $rule, $data = [])
    {
        $score = 0;
        if (preg_match("/[0-9]+/", $value)) {

            $score++;

        }

        if (preg_match("/[0-9]{3,}/", $value)) {

            $score++;

        }

        if (preg_match("/[a-z]+/", $value)) {

            $score++;

        }

        if (preg_match("/[a-z]{3,}/", $value)) {

            $score++;

        }

        if (preg_match("/[A-Z]+/", $value)) {

            $score++;

        }

        if (preg_match("/[A-Z]{3,}/", $value)) {

            $score++;

        }

        if (preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]+/", $value)) {

            $score += 2;

        }

        if (preg_match("/[_|\-|+|=|*|!|@|#|$|%|^|&|(|)]{3,}/", $value)) {

            $score++;

        }

        if (strlen($value) >= 10) {

            $score++;

        }

        if($score<=3){
            return "password strength low! please increase the strength";
        }
        return true;
    }
}