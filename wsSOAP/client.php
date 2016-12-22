<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class client {
    
    public function __construct() {
    
        $params = array('location' => 'http://localhost/pwm/ws/server.php',
        'uri' => 'urn://localhost/pwm/ws/server.php',
        'trace' => 1);
    
        $this->instance = new SoapClient(NULL, $params);
    }
    
    public function getAllPlates($idArray) {
        return $this->instance->__soapCall('getAllPlates', $idArray);
    }
}
?>