<?php
require_once("./PlateRestHandler.php");
require_once("./DrinkRestHandler.php");
		
$view = "";
if(isset($_GET["view"]))
	$view = $_GET["view"];
/*
controls the RESTful services
URL mapping
*/
switch($view){

	case "plates":
		// to handle RESTws Url /mobile/list/
		$restHandler = new PlateRestHandler();
//		$mobileRestHandler->getAllMobiles();
		$restHandler->getAllPlates();
		break;
		
	case "singlePlate":
		// to handle REST Url /mobile/show/<id>/
		$restHandler = new PlateRestHandler();
		$restHandler->getPlate($_GET["id"]);
		break;

	case "drinks":
		$restHandler = new DrinkRestHandler();
		$restHandler->getAllDrinks();
		break;
            
        case "singleDrink":
		$restHandler = new DrinkRestHandler();
		$restHandler->getDrink($_GET["id"]);
		break;
	           		
//	case "single":
//		// to handle REST Url /mobile/show/<id>/
//		$mobileRestHandler = new RestHandler();
//		$mobileRestHandler->getMobile($_GET["id"]);
//		break;

//	case "all":
//		// to handle REST Url /mobile/list/
//		$mobileRestHandler = new PlateRestHandler();
//		$mobileRestHandler->getAllMobiles();
//		break;

	case "" :
		//404 - not found;
                echo "?view=all <br /><br />";
                echo "utilizza -> <a href=\"../piatti/listaCompleta/\">/piatti/listaCompleta/</a> oppure /piatti/lista/ID/<br />";
                echo "utilizza -> <a href=\"../bevande/listaCompleta/\">/bevande/listaCompleta/</a> oppure bevande/lista/ID/<br />";
		break;
}
?>
