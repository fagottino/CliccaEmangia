<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../Database.php';

$app = new \Slim\App;
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->get('/getPlates', function (Request $request, Response $response) {
    try {
        $connection = Database::getConnection();
        $getAllPlate = $connection->query("SELECT * FROM plate");
        
        if ($getAllPlate->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($getAllPlate)) {
                echo json_encode($row);
            }
        } else {
            $response->getBody()->write("Non ci sono piatti");
        }
    } catch (DatabaseException $ex) {
            $response->getBody()->write($ex->getMessage());
    }
});
$app->get('/getDrinks', function (Request $request, Response $response) {
    try {
        $connection = Database::getConnection();
        $getAllPlate = $connection->query("SELECT * FROM drink");
        
        if ($getAllPlate->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($getAllPlate)) {
                echo json_encode($row);
            }
        } else {
            $response->getBody()->write("Non ci sono bevande");
        }
    } catch (DatabaseException $ex) {
            $response->getBody()->write($ex->getMessage());
    }
});
$app->get('/getPlates/{id}', function (Request $request, Response $response) {
    $idPlate = $request->getAttribute('id');
    
    try {
        $connection = Database::getConnection();
        $getPlate = $connection->query("SELECT * FROM plate WHERE id_plate = '".$idPlate."'");
        
        if ($getPlate->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($getPlate)) {
                echo json_encode($row);
            }
        } else {
            $response->getBody()->write("Piatto non trovato");
        }
    } catch (DatabaseException $ex) {
            $response->getBody()->write($ex->getMessage());
    }
});
$app->get('/getDrinks/{id}', function (Request $request, Response $response) {
    $idDrink = $request->getAttribute('id');
    
    try {
        $connection = Database::getConnection();
        $getDrink = $connection->query("SELECT * FROM drink WHERE id_drink = '".$idDrink."'");
        
        if ($getDrink->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($getDrink)) {
                echo json_encode($row);
            }
        } else {
            $response->getBody()->write("Bevanda non trovata");
        }
    } catch (DatabaseException $ex) {
            $response->getBody()->write($ex->getMessage());
    }
});
$app->run();
