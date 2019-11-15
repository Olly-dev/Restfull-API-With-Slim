<?php
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