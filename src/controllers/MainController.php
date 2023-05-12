<?php

namespace src\controllers;

use \core\Controller;
use src\models\Reservation;
use src\models\Table;

class MainController extends Controller
{

    public function index()
    {
        $myReserves = Reservation::select()->where('user_id', $_SESSION['user_id'])->execute();
        $allReserves = Reservation::select()->execute();

        $this->render('main', [
            'myReserves' => $myReserves,
            'allReserves' => $allReserves
        ]);
    }
}
