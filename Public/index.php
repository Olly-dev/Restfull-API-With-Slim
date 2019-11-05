<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add error middleware
//$app->addErrorMiddleware(true, true, true);

// Add routes
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('<a href="/hello/world">Try /hello/world</a>');
    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello World, $name");
    return $response;
});

//PST TEST (tester avec Postman)
$app->post('/testPost/demo', function(Request $req, Response $rep){

	$data = $req->getParsedBody();
	$inputdata=[];
	$name = $inputdata['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
	$phone = $inputdata['phone'] = filter_var($data['phone'], FILTER_SANITIZE_STRING);
	$rep->getBody()->write("dear $name, your phone number is $phone");
	return $rep;
});

//Test avec arguments
$app->get('/testargs/{name}/{phone}', function ($request, $response, $args) {
    $name = $args['name'];
    $phone = $args['phone'];
    $response->getBody()->write("Hello $name This is test for args, your phone is $phone");
    return $response;
});

$app->run();