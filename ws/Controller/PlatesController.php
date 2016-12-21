<?php
//require_once '../admin/Model/Database.php';
//require_once './Model/Plates.php';
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
        return $listPlate;
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
        case 'edit':
            try {
            $plate = new Plate();
            $plate->setId($_POST['idplate']);
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
                $path = "";
            }
            $plate->setImagePath($path);
            $updatePlate = $plateController->editPlate($plate);
            $updatePlate = true;
                if ($updatePlate) {
                    echo "1";
                }
            } catch (PlateException $e) {
                echo $e->getMessage();
            } catch (DatabaseException $e) {
                echo $e->getMessage();
            }
        break;
        case "delete":
            $plateController->deletePlate($_POST['id']);
            echo "1";
        break;
        default:
            echo "none";
        break;
    }
}

class PlatesException extends Exception { }

?>
