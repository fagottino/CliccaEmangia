<?php
if (file_exists('../Model/Database.php')) {
    require_once '../Model/Database.php';
    require_once '../Model/Plate.php';
} else {
    require_once './Model/Database.php';
    require_once './Model/Plate.php';
}
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
        return $listPlate;
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
                $path = "../images/".$sourceName;
            } else {
                $sourceName = "not-available.png";
                $path = "../images/".$sourceName;
            }
            $plate->setImagePath($path);
            $insertPlate = $plateController->addPlate($plate);
            $insertPlate = true;
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
