<?php
// Regular expression test
$app->get('/regular/{id:[0-9]+}/{name:[a-z]+}', function($request, $response, $args){
	$id = $args['id'];
	$name = $args['name'];
	$response->getBody()->write("This id = $id and The name is $name");
	return $response;
});