<?php

namespace src\models;

use \core\Model;

class User extends Model
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $token;

    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }
 
    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public static function save() {
    }
        
    public static function delete() {
    }
        
    public function listVerifyLogin($params) {
        $users = $this::select()->where('email', $params['email'])->first();
        return $users;
    }

}
