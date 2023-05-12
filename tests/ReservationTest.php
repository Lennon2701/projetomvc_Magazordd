<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use src\models\Reservation;

class ReservationTest extends TestCase
{

    public function testSave()
    {
        $params = [
            'table_id' => 17,
            'user_id' => 2,
            'date_initial' =>  '18/05/2023',
            'hour_initial' => '18:20:00',
            'hour_final' => '23:00:00'
        ];

        $reservation = new Reservation();
        $this->expectException(\ArgumentCountError::class);
        $this->assertTrue($reservation->save($params));
    }

    public function testRemove()
    {
        $params = [
            'id' => 33,
        ];

        $reservation = new Reservation();
        $this->assertTrue($reservation->remove($params['id']));
    }
}