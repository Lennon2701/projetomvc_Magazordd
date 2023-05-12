<?php

namespace src\controllers;

use \core\Controller;
use src\models\Table;

class TableController extends Controller
{

    public function index()
    {
        $table = new Table;
        $tables = $table->list();

        $this->render('/tables/list', [
            'tables' => $tables,
        ]);
    }
}
