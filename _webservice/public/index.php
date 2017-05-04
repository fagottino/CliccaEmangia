<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';
require '../Database.php';

$app = new \Slim\App;
$app->get('/hello/{name}/', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});
$app->get('/getPlate/', function (Request $request, Response $response) {
    try {
        $connection = Database::getConnection();
        $getAllPlate = $connection->query("SELECT * FROM plate");

        if ($getAllPlate->num_rows == 0) {
                $response->getBody()->write("Non ci sono piatti disponibili");
            } else {
                $aaa = array("keias" => "valuia");
                echo json_encode($getAllPlate);
            }
    } catch (DatabaseException $exception) {
        $response->getBody()->write($exception->getMessage());
    }
    
});
$app->run();

