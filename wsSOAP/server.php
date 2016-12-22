<?php
require_once './Database.php';
require_once './PlateController.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class server {
    
    public function __construct() {
        
    }
    
    public function getAllPlates() {	

                $plateController = new PlatesController();
		$rawData = $plateController->getAllPlate();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No plates found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
		}
                return $response;
	}
        
	public function encodeHtml($responseData) {
	
		$htmlResponse = "<table border='1'>";
		foreach($responseData as $key=>$value) {
                    if (is_array($value)) {
                        foreach($value as $keys=>$values) {
                            $htmlResponse .= "<tr><td>". $keys. "</td><td>". $values. "</td></tr>";
                        }
                    } else {
    			$htmlResponse .= "<tr><td>". $key. "</td><td>". $value. "</td></tr>";
                    }
		}
		$htmlResponse .= "</table>";
		return $htmlResponse;		
	}
	
	public function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
	
	public function encodeXml($responseData) {
		// creating object of SimpleXMLElement
		$xml = new SimpleXMLElement('<?xml version="1.0"?><mobile></mobile>');
		foreach($responseData as $key=>$value) {
			$xml->addChild($key, $value);
		}
		return $xml->asXML();
	}
}

$params = array('uri' => './server.php');
$server = new SoapServer(NULL, $params);
$server->setClass('server');
$server->handle();

?>