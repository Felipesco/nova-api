<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . ' ./vendor/autoload.php';

$app = AppFactory::create();

//GET  /
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Documentação disponivel em https://github.com/Felipesco/nova-api");
    return $response;
});










$app->run();

?>