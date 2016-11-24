<?php
session_start();
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
    
    public function __construct() { }
    
    public function login($_email, $_password) {
        $_email = htmlspecialchars($_POST['email'],ENT_QUOTES);
        $_password = md5($_POST['password']);
        
        if ($_email == "" || $_email == NULL) {
            throw new UserException("Username non valido.");
        } else if ($_password == "" || $_password == NULL) {
            throw new UserException("Password non valida.");
        } else {
            try {
                $connection = Database::getConnection();
                $findUser = $connection->query("SELECT * FROM `user` WHERE email = '".$_email."' AND password = '".$_password."'");
                Database::releaseConnection($connection);
            } catch (DatabaseException $e) {
                throw new DatabaseException($e->getMessage());
            }
            
            if ($findUser != NULL) {
                if ($findUser->num_rows > 0) {
                    $result = $findUser->fetch_assoc();
                    $user = new User();
                    try {
                        $user->setName($result['name']);
                        $user->setSurname($result['surname']);
                        $user->setEmail($result['email']);
                        $user->setTelephone($result['telephone']);
                    } catch (UserException $e) {
                        throw new UserException($e->getMessage());
                    }
                    $_SESSION['user'] = $result;
                    return true;
                } else {
                    throw new UserException("Credenziali errate.");
                }
            } else {
                throw new UserException("Errore nella query del database.");
            }
        }
    }
    
    public function logout() {
        session_destroy();
    }
}

if (isset($_POST['type'])) {
    $userController = new UserController();
    switch ($_POST['type']) {
        case 'login':
            try {
                $login = $userController->login($_POST['email'], $_POST['password']);
                if ($login)
                    echo "1";
            } catch (UserException $e) {
                echo $e->getMessage();
            } catch (DatabaseException $e) {
                echo $e->getMessage();
            }
        break;
        case 'logout':
            $userController->logout();
        break;
    }
}

class UserException extends Exception { }

?>