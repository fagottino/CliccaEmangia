<?php
if (file_exists('../Model/Database.php')) {
    require_once '../Model/Database.php';
    require_once '../Model/Drink.php';
} else {
    require_once './Model/Database.php';
    require_once './Model/Drink.php';
}
/**
 * Description of PlateController
 *
 * @author fagottino
 */
class DrinkController {
    
    public function __construct() {
        
    }
    
    public function addDrink(Drink $_drink) {
        $connection = Database::getConnection();
        $sql = "INSERT INTO `drink` (name, description, price, image, size, available) VALUES ('".$_drink->getName()."', '".$_drink->getDescription()."', '".$_drink->getPrice()."', '".$_drink->getImagePath()."', '".$_drink->getSize()."', '".$_plate->getAvailable()."')";
        $insertDrink = $connection->query("INSERT INTO `drink` (name, description, price, image, size, available) VALUES ('".$_drink->getName()."', '".$_drink->getDescription()."', '".$_drink->getPrice()."', '".$_drink->getImagePath()."', '".$_drink->getSize()."', '".$_plate->getAvailable()."')");
    }
    
    public function getAllDrink() {
        $connection = Database::getConnection();
        $getAllDrink = $connection->query("SELECT * FROM drink");
        if ($getAllDrink->num_rows > 0) {
        $listDrink = $getAllDrink;
        } else {
            $listDrink = 0;
        }
        return $listDrink;
    }
    
    public function deleteDrink($_idDrink) {
        $connection = Database::getConnection();
        $deletePlate = $connection->query("DELETE FROM plate WHERE id_plate = '".$_idPlate."'");
    }
    
    public function getDrink($_idDrink) {
        $connection = Database::getConnection();
        $getPlate = $connection->query("SELECT * FROM plate WHERE id_plate = '".$_idPlate."'");
        if ($getPlate->num_rows > 0) {
        $plate = $getPlate->fetch_assoc();
        } else {
            $plate = 0;
        }
        return $plate;
    }
    
    public function editPlate(Drink $_drink) {
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
    $drinkController = new DrinkController();
    switch ($_POST['type']) {
        case 'insert':
            try {
            $drink = new Drink();
            $drink->setId(NULL);
            $drink->setName($_POST['name']);
            $drink->setDescription($_POST['description']);
            $drink->setPrice($_POST['price']);
            ($_POST['available'] == "1" ? $drink->setAvailable("1") : $drink->setAvailable("0"));
            if (isset($_FILES['drinkImage']['name'])) {
                $sourceName = $_FILES['drinkImage']['name'];
                $path = "../../images/".$sourceName;
                move_uploaded_file($_FILES['drinkImage']['tmp_name'], $path);
                $path = "../images/".$sourceName;
            } else {
                $sourceName = "not-available.png";
                $path = "../images/".$sourceName;
            }
            $drink->setImagePath($path);
            $drink->setSize($_POST['cl']);
            $insertDrink = $drinkController->addDrink($drink);
            $insertDrink = true;
                if ($insertDrink) {
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
    }
}

class PlateException extends Exception { }

?>
