<?php

namespace src\controllers;

use \core\Controller;
use src\models\Person;
use src\models\Contact;
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

    public function index()
    {
        $person = Person::select()->execute();
        $contact = Contact::select()->execute();

        $this->render('home', [
            'person' => $person,
            'contact' => $contact
        ]);
    }
}
