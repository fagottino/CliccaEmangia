<?php
require_once getcwd().'/Database.php';
//require_once getcwd().'/Model/Plates.php';
/**
 * Description of PlateController
 *
 * @author fagottino
 */
class PlatesController {
    
    public function __construct() {
        
    }
    
    public function addPlate(Plate $_plate) {
        $connection = Database::getConnection();
        $insertPlate = $connection->query("INSERT INTO `plate` (name, description, price, image, available) VALUES ('".$_plate->getName()."', '".$_plate->getDescription()."', '".$_plate->getPrice()."', '".$_plate->getImagePath()."', '".$_plate->getAvailable()."')");
    }
    
    public function getAllPlate() {
        $connection = Database::getConnection();
        $getAllPlate = $connection->query("SELECT * FROM plate");
        if ($getAllPlate->num_rows > 0) {
        $listPlate = $getAllPlate;
        } else {
            $listPlate = 0;
        }
	$plates = array();
	while ($singlePlate = $listPlate->fetch_assoc()) {
	$platesse = array("id_plate" => $singlePlate["id_plate"], "name" => $singlePlate["name"], "description" => $singlePlate["description"], "price" => $singlePlate["price"], "image" => $singlePlate["image"], "available" => $singlePlate["available"]);
	$plates[] = $platesse;
	}
        return $plates;
    }
    
    public function deletePlate($_idPlate) {
        $connection = Database::getConnection();
        $deletePlate = $connection->query("DELETE FROM plate WHERE id_plate = '".$_idPlate."'");
    }
    
    public function getPlate($_idPlate) {
        $connection = Database::getConnection();
        $getPlate = $connection->query("SELECT * FROM plate WHERE id_plate = '".$_idPlate."'");
        if ($getPlate->num_rows > 0) {
        $plate = $getPlate->fetch_assoc();
        } else {
            $plate = 0;
        }
        return $plate;
    }
    
    public function editPlate(Plate $_plate) {
        $connection = Database::getConnection();
        if ($_plate->getImagePath() != "") {
            $editPlate = $connection->query("UPDATE plate SET name = '".$_plate->getName()."', description = '".$_plate->getDescription()."', price = '".$_plate->getPrice()."', image = '".$_plate->getImagePath()."', available = '".$_plate->getAvailable()."' WHERE id_plate = '".$_plate->getId()."'");
        } else {
            $sql = "UPDATE plate SET name = '".$_plate->getName()."', description = '".$_plate->getDescription()."', price = '".$_plate->getPrice()."', available = '".$_plate->getAvailable()."' WHERE id_plate = '".$_plate->getId()."'";
            $editPlate = $connection->query("UPDATE plate SET name = '".$_plate->getName()."', description = '".$_plate->getDescription()."', price = '".$_plate->getPrice()."', available = '".$_plate->getAvailable()."' WHERE id_plate = '".$_plate->getId()."'");
        }
    }
}

class PlateException extends Exception { }

?>
