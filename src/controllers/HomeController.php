<?php

namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;

class HomeController extends Controller
{

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = UserHandler::checkLogin();

        if (!$this->loggedUser) {
            $this->redirect('/login');
        } else {
            $this->redirect('/main');
        }
    }
} 
