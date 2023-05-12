<?php

namespace src\handlers;

use src\models\User;

class UserHandler
{
    public static function checkLogin()
    {

        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()->where('token', $token)->first();

            return $data;
        }
        return false;
    }



    public static function verifyLogin($email, $password)
    {
        $user = new User();
        $params = [
            'email' => $email,
            'password' => $password
        ];
        
        $user = $user->listVerifyLogin($params);

        if ($user) {
            if ($password == $user['password']) {
                $token = md5(time() . rand(0, 9999) . time());

                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                    ->execute();

                return [
                    'user_id' => $user['id'],
                    'name' => $user['name'],
                    'token' => $token 
                ];
            }
        }

        return false;
    }
}
