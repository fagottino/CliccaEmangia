<?php
/**
 * Description of Database
 *
 * @author fagottino
 */
class Database {
        
    public static function getConnection() {
        $connection = new mysqli("localhost", "root", "", "pwm");
        if ($connection->connect_errno == 0) {
            $connection->set_charset('UTF-8');
            return $connection;
        } else {
            throw new DatabaseException("Errore nella connessione al database.");
        }
    }
    
    public static function releaseConnection($_connection) {
        $_connection->close();
    }
}

class DatabaseException extends Exception { }
