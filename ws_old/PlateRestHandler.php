<?php
require_once('./Model/SimpleRest.php');
include_once('./Model/Plates.php');
include_once('./Controller/PlateController.php');
		
class PlateRestHandler extends SimpleRest {

	function getAllPlates() {	

                $plate = new Plates();
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
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}

	function getPlate($_id) {	

                $plate = new Plates();
                $plateController = new PlatesController();
		$rawData = $plateController->getPlate($_id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No plate found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this->setHttpHeaders($requestContentType, $statusCode);
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
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
?>
