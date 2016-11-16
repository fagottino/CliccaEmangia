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
    
    public function createUser($_name, $_surname, $_email, $_telephone) {
        $this->name = $_name;
        $this->surname = $_surname;
        $this->email = $_email;
        $this->telephone = $_telephone;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setName($_name) {
        $this->name = $_name;
    }

    public function setSurname($_surname) {
        $this->surname = $_surname;
    }

    public function setEmail($_email) {
        $this->email = $_email;
    }

    public function setTelephone($_telephone) {
        $this->telephone = $_telephone;
    }
}
