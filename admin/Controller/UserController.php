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
//class UserController {
    
//    public function __construct() {
        if (isset($_POST['type'])) {
            switch ($_POST['type']) {
                case 'login':
                    login($_POST['email'], $_POST['password']);
                break;
            }
        }
//    }
    
//    public function login($_email, $_password) {
        function login($_email, $_password) {
        //$_email = htmlspecialchars($_POST['email'],ENT_QUOTES);
        $_email = $_POST['email'];
        $_password = md5($_POST['password']);
        if ($_email == "" || $_email == NULL) {
            //throw new UserException("Username non valido.");
            echo "Username non valido.";
        } else if ($_password == "" || $_password == NULL) {
            //throw new UserException("Password non valida.");
            echo "Password non valida.";
        } else {
            $connection = Database::getConnection();
            //$findUser = $connection->query("SELECT * FROM user WHERE email = '".$_email."' AND password = '".$_password."'");
            $findUser = $connection->query("SELECT * FROM `user` WHERE email = 'test@test.it' AND password = 'ab34210c47eedef9818b040cd778c429'");
            
            if ($findUser != NULL) {
                $row = $findUser->fetch_assoc();
                if ($row->num_rows > 0)
                    $_SESSION['userid'] = $findUser['idUser'];
            } else {
                //throw new UserExceptio("Non ho trovato alcun utente con queste credenziali.");
                echo "Non ho trovato alcun utente con queste credenziali.";
            }
        }
    }
//}

//class UserException extends Exception { }

?>