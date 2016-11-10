<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author fagottino
 */
class User {
    private $id;
    private $name;
    private $surname;
    private $email;
    private $telephone;
    
    public function createUser($_id, $_name, $_surname, $_email, $_telephone) {
        $this->id = $_id;
        $this->name = $_name;
        $this->surname = $_surname;
        $this->email = $_email;
        $this->telephone = $_telephone;
    }
    
}
