<?php
require_once './client.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id = array('id' => '1');
$client = new client();
echo $client->getAllPlates($id);
?>