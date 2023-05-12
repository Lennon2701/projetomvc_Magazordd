<?php

namespace src\controllers;

use \core\Controller;
use src\models\Reservation;
use src\models\Table;
use src\models\User;

class ReservationController extends Controller
{

    public function index($params)
    {
        $reservations = new Reservation();
        $data = $reservations->list($params);

        $message = '';
        if (!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $_SESSION['message'] = '';
        }
        $this->render('/reservations/list', [
            'reservations' => $data,
            'message' => $message
        ]);
    }

    public function add()
    {
        $message = '';
        if (!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $_SESSION['message'] = '';
        }

        $tables = new Table();
        $data = $tables->list();

        $this->render('/reservations/my/insert', [
            'message' => $message,
            'tables' => $data
        ]);
    }

    public function insert($params)
    {
        $table = filter_input(INPUT_POST, 'table_id');
        $date_initial = filter_input(INPUT_POST, 'date_initial');
        $hour_initial = filter_input(INPUT_POST, 'hour_initial');
        $hour_final = filter_input(INPUT_POST, 'hour_final');

        $params = [
            'id' => $params['id'],
            'table_id' => $table,
            'date_initial' => $date_initial,
            'hour_initial' => $hour_initial,
            'hour_final' => $hour_final
        ];

        $reservation = new Reservation();
        $data = $reservation->save($params);

        $_SESSION['message'] = $data['message'];
        if($data['response']) {
            $this->redirect('/reservations');
            exit;
        } else {
            $this->redirect('/reservations/my/insert');
        }
    }

    public function edit($params)
    {
        $reservation = new Reservation();
        $listReservation = $reservation->listEdit($params);

        $tables = new Table();
        $listTables = $tables->list();

        $message = '';
        if (!empty($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $_SESSION['message'] = '';
        }
        $this->render('/reservations/my/edit', [
            'message' => $message,
            'reservation' => $listReservation,
            'tables' => $listTables
        ]);
    }

    public function delete($params)
    {
        $reservation = new Reservation();
        $reservation->remove($params['id']);

        $_SESSION['message'] = 'Reserva deletada com sucesso!';
        $this->redirect('/reservations');
    }

}
