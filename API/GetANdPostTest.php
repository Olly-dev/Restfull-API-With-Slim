<?php
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

//_____________________________________________________________________________________________
//POST TEST (tester avec Postman)
$app->post('/testPost/demo', function(Request $req, Response $rep){

	$data = $req->getParsedBody();
	$inputdata=[];
	$name = $inputdata['name'] = filter_var($data['name'], FILTER_SANITIZE_STRING);
	$phone = $inputdata['phone'] = filter_var($data['phone'], FILTER_SANITIZE_STRING);
	$rep->getBody()->write("dear $name, your phone number is $phone");
	return $rep;
});