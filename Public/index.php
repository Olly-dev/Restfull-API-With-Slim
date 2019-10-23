<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Exception\NotFoundException;


require __DIR__ . '/../vendor/autoload.php';
//require __DIR__ .'/../vendor/slim/slim/Slim/Exception/NotFoundException.php';

$app = AppFactory::create();

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello World, $name");
    return $response;
});

$app->run();