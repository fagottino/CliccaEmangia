<?php
require_once '../Model/Database.php';
require_once '../Model/User.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author fagottino
 */
class UserController {
    
    public function __construct() {
        
    }
    
    public function login($_username, $_password) {
        $_username = htmlspecialchars($_POST['username'],ENT_QUOTES);
        $_password = md5($_POST['password']);
        if ($_username == "" || $_username == NULL) {
            throw new UserException("Username non valido.");
        } else if ($_password == "" || $_password == NULL) {
            throw new UserException("Password non valida.");
        } else {
            $connection = Database::getConnection();
            $findUser = $connection->query("SELECT * FROM user WHERE username = ".$_username." AND password = ".$_password."");
            
            if ($findUser->num_rows > 0) {
                $_SESSION['userid'] = $findUser['idUser'];
            } else {
                throw new UserExceptio("Non ho trovato alcun utente con queste credenziali.");
            }
        }
    }
}

class UserException extends Exception { }