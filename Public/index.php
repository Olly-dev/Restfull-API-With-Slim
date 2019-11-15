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

//Test Envoi du Json Response
$app->get('/jsontest/{FirstName}/{LatsName}', function ($request, $response, $args) {
    $FirstName = $args['FirstName'];
    $LatsName = $args['LatsName'];
    $out=[];
    $out['Status'] = 200;
    $out['Message'] = "This is Json Response Test";
    $out['FirstName'] = $FirstName;
    $out['LatsName'] = $LatsName;

    $response->getBody()->write(json_encode($out));
    return $response;
});

//Put Resource
$app->put('/testput', function($Request, $Response){

	$data = $Request->getParsedBody();
	$username = $data['UserName'];
	$password = $data['Password'];
	$Response->getBody()->write("$username your Password is $password");
	return $Response;

});

//Delete Resource
$app->delete('/testdelete', function($Request, $Response){

	$data = $Request->getParsedBody();
	$username = $data['UserName'];
	$password = $data['Password'];
	$Response->getBody()->write("$username your Password is $password With Delete Test Demo");
	return $Response;

});

//Multiple Methods
$app->map(['PUT', 'GET'], '/multipleMethodsTest/{id}', function($request, $response, $args){

	$id = $args['id'];
	if($request->getMethod() == "PUT"){

		$response->getBody()->write("This id=$id Will be Updated");
	}
	if($request->getMethod() == "GET"){

		$response->getBody()->write("This id=$id Will be retrived ");
	}
	return $response;
});

// Optional Segments
$app->get('/optional[/{id}]', function($request, $response, $args){

	$id = $args['id'];
	if(is_null($id)){
		$response->getBody()->write("This id is null");
	}
	else{
		$response->getBody()->write("This id = $id");
	}
	return $response;
});

// Multiple Optional Segments
$app->get('/multiple/optional[/{year}[/{month}]]', function($request, $response, $args){

	$year = $args['year'];
	$month = $args['month'];
	if(is_null($year)){
		$response->getBody()->write("This year and month are null");
	}
	else{
		if(is_null($month)){
			$response->getBody()->write("This year = $year and the month is null");
		}else{
			$response->getBody()->write("This year = $year and the month = $month");
		}
	}
	return $response;
});

// Unlimited Optional Segments
$app->get('/unlimited/optional[/{params:.*}]', function($request, $response, $args){

	$params = explode('/', $request->getAttribute('params'));
	if(empty($params[0])){
		$response->getBody()->write("The params list is null");
	}
	else{
		$out="";
		foreach ($params as $key => $value) {
			$out = $out . " " . "$key => $value \r";
		}
		$response->getBody()->write($out);
	}
	return $response;
});

// Regular expression test
$app->get('/regular/{id:[0-9]+}/{name:[a-z]+}', function($request, $response, $args){
	$id = $args['id'];
	$name = $args['name'];
	$response->getBody()->write("This id = $id and The name is $name");
	return $response;
});

$app->run();