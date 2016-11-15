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
    
    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelephone() {
        return $this->telephone;
    }

    function setId($_id) {
        $this->id = $_id;
    }

    function setName($_name) {
        $this->name = $_name;
    }

    function setSurname($_surname) {
        $this->surname = $_surname;
    }

    function setEmail($_email) {
        $this->email = $_email;
    }

    function setTelephone($_telephone) {
        $this->telephone = $_telephone;
    }
}
