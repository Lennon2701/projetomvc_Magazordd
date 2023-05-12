<?php

namespace src\models;

use \core\Model;

class Table extends Model
{
    private $id;
    private $description;

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public static function save() {
    }

    public static function delete() {
    }
        
    public function list() {
        $users = $this::select()->orderBy('id')->execute();
        return $users;
    }
}
