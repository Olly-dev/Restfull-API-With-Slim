<?php
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