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
            ($_POST['available'] == "1" ? $plate->setAvailable("1") : $plate->setAvailable("0"));
            if (isset($_FILES['plateImage']['name'])) {
                $sourceName = $_FILES['plateImage']['name'];
                $path = "../../images/".$sourceName;
                move_uploaded_file($_FILES['plateImage']['tmp_name'], $path);
            } else {
                $sourceName = "not-available.png";
                $path = "../../images/".$sourceName;
            }
            $plate->setImagePath($path);
            $insertPlate = $plateController->addPlate($plate);
            $insertPlate = true;
                if ($insertPlate) {
                    echo "UNOUNOUNO 1 -> ".$path;
                }
            } catch (PlateException $e) {
                echo "TESTUNO ". $e->getMessage();
            } catch (DatabaseException $e) {
                echo "TESTDUE ". $e->getMessage();
            }
        break;
    }
}

class PlateException extends Exception { }

?>
