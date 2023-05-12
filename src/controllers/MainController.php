<?php

namespace src\controllers;

use \core\Controller;
use src\models\Reservation;

class MainController extends Controller
{

    public function index()
    {
        $reserves = new Reservation;
        $myReserves = $reserves->list(['id' => $_SESSION['user_id']]);
        $allReserves = $reserves->list();

        $this->render('main', [
            'myReserves' => $myReserves,
            'allReserves' => $allReserves
        ]);
    }
}
