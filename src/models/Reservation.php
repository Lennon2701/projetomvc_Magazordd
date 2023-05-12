<?php

namespace src\models;

use \core\Model;

class Reservation extends Model
{

    private $id;
    private $table_id;
    private $user_id;
    private $date_initial;
    private $date_final;

    public function getId() {
        return $this->id;
    }

    public function getTableId() {
        return $this->table_id;
    }

    public function getUserId() {
        return $this->user_id;
    }

    public function getDateInitial() {
        return $this->date_initial;
    }

    public function getDateFinal() {
        return $this->date_final;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTableId($table_id) {
        $this->table_id = $table_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setDateInitial($date_initial) {
        $this->date_initial = $date_initial;
    }

    public function setDateFinal($date_final) {
        $this->date_final = $date_final;
    }

    public static function save($params) {

        if($params['hour_final'] <= $params['hour_initial']) {
            return [
                'message' => 'Hora Inicial não pode ser maior que a Hora Final',
                'response' => false
            ];
        }

        $params['newDate_initial'] = Reservation::formatDateHour($params['date_initial'], $params['hour_initial']);
        $params['newDate_final'] = Reservation::formatDateHour($params['date_initial'], $params['hour_final']);

        $reservation = Reservation::select()->where('table_id', $params['table_id'])->where('date_initial' , '<', $params['newDate_final'])->where('date_final', '>', $params['newDate_initial'])->first();

        if($reservation) {
            return [
                'message' => 'Já existe uma reserva desta mesa para a data e o horário informado',
                'response' => false
            ];
        } else {
            if($params['id']) {
                Reservation::update()
                    ->set('table_id', $params['table_id'])
                    ->set('user_id', $_SESSION['user_id'])
                    ->set('date_initial', $params['newDate_initial'])
                    ->set('date_final', $params['newDate_final'])
                    ->where('id', $params['id'])
                    ->execute();

                $message = 'Reserva alterada com sucesso!';
            } else {
                Reservation::insert([
                   'table_id' => $params['table_id'],
                   'user_id' => $_SESSION['user_id'],
                   'date_initial' => $params['newDate_initial'],
                   'date_final' => $params['newDate_final']
               ])->execute();

               $message = 'Reserva efetuada com sucesso!';
            }
            
            return [
                'message' => $message,
                'response' => true
            ];
        }

        return false;
    }
        
    public static function remove($id) {
        Reservation::delete()
            ->where('id', $id)
            ->execute();

        return true;
            
    }
        
    public function list($params = null) {
        if(isset($params['id']))
            $reservations =  $this::select('reservation.id, reservation.table_id, reservation.date_initial, reservation.date_final, user.id as user_id, user.name, table.description')->join('user', 'user.id', '=', 'reservation.user_id')->join('table', 'table.id', '=', 'reservation.table_id')->where('user_id', $params['id'])->execute();
        else 
            $reservations = $this::select('reservation.id, reservation.table_id, reservation.date_initial, reservation.date_final, user.id as user_id, user.name, table.description')->join('user', 'user.id', '=', 'reservation.user_id')->join('table', 'table.id', '=', 'reservation.table_id')->execute();

        $listReservations = [];
        foreach ($reservations as $reservation) {
            $reservation['date_initial'] = date_format(date_create($reservation['date_initial']), 'd/m/Y H:i');
            $reservation['date_final'] = date_format(date_create($reservation['date_final']), 'd/m/Y H:i');

            $listReservations[] = $reservation;
        }
        return $listReservations;
    }

    public static function listEdit($id) {
        $reservation = Reservation::select()->where('id', $id)->first();
        $reservation['hour_initial'] = date_format(date_create($reservation['date_initial']), 'H:i:s');
        $reservation['hour_final'] = date_format(date_create($reservation['date_final']), 'H:i:s');
        $reservation['date_initial'] = date_format(date_create($reservation['date_final']), 'd/m/Y');

        return $reservation;
    }

    public static function formatDateHour($date, $hour) {
        $date  = explode('/', $date);
        $dateFormat =  $date[2] . '-' . $date[1] .  '-' . $date[0] . ' ' . $hour;
        return $dateFormat;
    }

}
