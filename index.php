<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . ' ./vendor/autoload.php';
require_once __DIR__ . '/model/conexaoBD.php';

$app = AppFactory::create();

//GET  /
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Documentação disponivel em https://github.com/Felipesco/nova-api");
    return $response;
});

//GET /Alunos
$app->get('/alunos', function (Request $request, Response $response, $args){
    $sql = "SELECT * FROM tbAluno";

    $alunos = array();
    $resultado = ConexaoBD::getInstance()->getHandler()->query($sql);

    while ($linha = $resultado->fetch_assoc()){
        $alunos[] = $linha;
    }

    $response->getBody()->write(json_encode($alunos));
    return $response -> withHeader('Content-type', 'application/json');

});








$app->run();

?>