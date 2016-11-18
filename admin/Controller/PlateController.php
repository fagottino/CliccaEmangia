<?php
require_once '../Model/Database.php';
require '../Model/Plate.php';
/**
 * Description of PlateController
 *
 * @author fagottino
 */
class PlateController {
    
    public function __construct() {
        
    }
    
    public function addPlate(Plate $_plate) {
        $connection = Database::getConnection();
        $sql = "INSERT INTO `plate` (name, description, price, available) VALUES (".$_plate->getName().", ".$_plate->getDescription().", ".$_plate->getPrice().", ".$_plate->getAvailable().")";
        $insertPlate = $connection->query("INSERT INTO `plate` (name, description, price, available) VALUES ('".$_plate->getName()."', '".$_plate->getDescription()."', '".$_plate->getPrice()."', '".$_plate->getAvailable()."')");
    }
}

if (isset($_POST['type'])) {
    $plateController = new PlateController();
    switch ($_POST['type']) {
        case 'insert':
            try {
            $plate = new Plate();
            $plate->setName($_POST['name']);
            $plate->setDescription($_POST['description']);
            $plate->setPrice($_POST['price']);
            //$plate->setAvailable($_POST['available']);
            ($_POST['available'] == true ? $plate->setAvailable("1") : $plate->setAvailable("0"));
            $insertPlate = $plateController->addPlate($plate);
                if ($insertPlate) {
                    echo "1";
                }
            } catch (PlateException $e) {
                echo $e->getMessage();
            } catch (DatabaseException $e) {
                echo $e->getMessage();
            }
        break;
    }
}

class PlateException extends Exception { }

?>
