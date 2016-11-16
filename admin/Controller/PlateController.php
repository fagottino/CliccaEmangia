<?php
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
        $insertPlate = $connection->query("INSERT INTO `plate` VALUES (".$_plate->getName().", ".$_plate->getDescription().", ".$_plate->getPrice().", ".$_plate->getImagePath().", ".$_plate->getAvailable().")");
    }
}

if (isset($_POST['type'])) {
    $userController = new PlateController();
    switch ($_POST['type']) {
        case 'login':
            try {
            $plate = new Plate();
            $plate->setName($_POST['name']);
                $login = $userController->login($_POST['email'], $_POST['password']);
                if ($login)
                    echo "1";
            } catch (UserException $e) {
                echo $e->getMessage();
            } catch (DatabaseException $e) {
                echo $e->getMessage();
            }
        break;
        case 'logout':
            $user->logout();
        break;
    }
}

class UserException extends Exception { }

?>
