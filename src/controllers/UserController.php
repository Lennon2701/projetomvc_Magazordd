<?php

namespace src\controllers;

use \core\Controller;
use src\handlers\UserHandler;

class UserController extends Controller
{

    public function signin()
    {
        $message = '';
        if (!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $_SESSION['message'] = '';
        }
        $this->render('/login', [
            'message' => $message
        ]);
    }

    public function signinAction()
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if ($email && $password) {
            $data = UserHandler::verifyLogin($email, $password);

            if ($data) {
                session_start();
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['name'] = $data['name'];
                $_SESSION['token'] = $data['token'];
                $this->redirect('/');
            } else {
                $_SESSION['message'] = 'E-mail e/ou senha inválidos.';
                $this->redirect('/login');
            }
        } else {
            $this->redirect('/login');
        }
    }
}
