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
        $getAllPlate = $connection->query("SELECT * FROM plate WHERE available = '1'");
        $resp = "{plates:";
        $plates = array();
        if ($getAllPlate->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($getAllPlate)) {
                $plates[] = $row;
            }
            $resp .= json_encode($plates);
            $resp .= "}";
            $response->getBody()->write($resp);
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
        $getAllDrink = $connection->query("SELECT * FROM drink WHERE available = '1'");
        $resp = "{drinks:";
        $drinks = array();
        
        if ($getAllDrink->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($getAllDrink)) {
                $drinks[] = $row;
            }
            $resp .= json_encode($drinks);
            $resp .= "}";
            $response->getBody()->write($resp);
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

$app->get('/getRandomItems', function (Request $request, Response $response) {
    $idDrink = $request->getAttribute('id');
    
    try {
        $connection = Database::getConnection();
        $getItems = $connection->query("(SELECT name, description, image FROM `plate` WHERE available = '1' ORDER BY RAND() LIMIT 3)
                UNION
                (SELECT name, description, image  FROM `drink` WHERE available = '1' ORDER BY RAND() LIMIT 2)"
                );
        $resp = "{items:";
        $plates = array();
        if ($getItems->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($getItems)) {
                $plates[] = $row;
            }
            $resp .= json_encode($plates);
            $resp .= "}";
            $response->getBody()->write($resp);
        } else {
            $response->getBody()->write("Articoli non trovati");
        }
    } catch (DatabaseException $ex) {
            $response->getBody()->write($ex->getMessage());
    }
});

$app->get('/getMenuOfTheDay', function (Request $request, Response $response) {
    $idDrink = $request->getAttribute('id');
    
    try {
        $connection = Database::getConnection();
        $getItems = $connection->query("SELECT * FROM drink JOIN plate ON drink.of_the_day = plate.of_the_day WHERE drink.of_the_day = 1");
        $resp = "{items:";
        $plates = array();
        if ($getItems->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($getItems)) {
                $plates[] = $row;
            }
            $resp .= json_encode($plates);
            $resp .= "}";
            $response->getBody()->write($resp);
        } else {
            $response->getBody()->write("Menù del giorno non trovato");
        }
    } catch (DatabaseException $ex) {
            $response->getBody()->write($ex->getMessage());
    }
});

$app->run();
