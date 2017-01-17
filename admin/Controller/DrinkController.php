<?php
if (file_exists('../Model/Database.php')) {
    require_once '../Model/Database.php';
    require_once '../Model/Drink.php';
} elseif (file_exists('./Model/Database.php')) {
    require_once './Model/Database.php';
    require_once './Model/Drink.php';
} else {
    require_once './admin/Model/Database.php';
    require_once './admin/Model/Drink.php';
}
//die('ECCOLOOOOOOOOOOOOOOOOOOOOO '.getcwd());
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
        $insertDrink = $connection->query("INSERT INTO `drink` (name, description, price, image, size, available) VALUES ('".$_drink->getName()."', '".$_drink->getDescription()."', '".$_drink->getPrice()."', '".$_drink->getImagePath()."', '".$_drink->getSize()."', '".$_drink->getAvailable()."')");
    }
    
    public function getAllDrink($_available = false) {
        $connection = Database::getConnection();
        if ($_available)
            $getAllDrink = $connection->query("SELECT * FROM drink WHERE available = '1'");
        else
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
        $deleteDrink = $connection->query("DELETE FROM drink WHERE id_drink = '".$_idDrink."'");
    }
    
    public function getDrink($_idDrink) {
        $connection = Database::getConnection();
        $getDrink = $connection->query("SELECT * FROM drink WHERE id_drink = '".$_idDrink."'");
        if ($getDrink->num_rows > 0) {
            $drink = $getDrink->fetch_assoc();
        } else {
            $drink = 0;
        }
        return $drink;
    }
    
    public function editDrink(Drink $_drink) {
        $connection = Database::getConnection();
        if ($_drink->getImagePath() != "") {
            $editDrink = $connection->query("UPDATE drink SET name = '".$_drink->getName()."', description = '".$_drink->getDescription()."', price = '".$_drink->getPrice()."', image = '".$_drink->getImagePath()."', size= '".$_drink->getSize()."', available = '".$_drink->getAvailable()."' WHERE id_drink = '".$_drink->getId()."'");
        } else {
            $editDrink = $connection->query("UPDATE drink SET name = '".$_drink->getName()."', description = '".$_drink->getDescription()."', price = '".$_drink->getPrice()."', size= '".$_drink->getSize()."', available = '".$_drink->getAvailable()."' WHERE id_drink = '".$_drink->getId()."'");
        }
    }
}

if (isset($_POST['type'])) {
    $drinkController = new DrinkController();
    switch ($_POST['type']) {
        case 'insert':
            try {
                $drink = new Drink();
                $drink->setName($_POST['iddrink']);
                $drink->setName($_POST['name']);
                $drink->setDescription($_POST['description']);
                $drink->setPrice($_POST['price']);
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
                ($_POST['available'] == "1" ? $drink->setAvailable("1") : $drink->setAvailable("0"));
                $insertDrink = $drinkController->addDrink($drink);
            } catch (PlateException $e) {
                echo $e->getMessage();
            } catch (DatabaseException $e) {
                echo $e->getMessage();
            }
            echo "1";
        break;
        case 'edit':
            try {
                $drink = new Drink();
                $drink->setId($_POST['iddrink']);
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
                    $path = "";
                }
                $drink->setImagePath($path);
                $drink->setSize($_POST['cl']);
                $updateDrink = $drinkController->editDrink($drink);
            } catch (PlateException $e) {
                echo $e->getMessage();
            } catch (DatabaseException $e) {
                echo $e->getMessage();
            }
            echo "1";
        break;
        case "delete":
            $drinkController->deleteDrink($_POST['id']);
            echo "1";
        break;
    }
}

class DrinkException extends Exception { }

?>
