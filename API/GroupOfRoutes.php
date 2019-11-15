<?php
// Group of Routes

$app->group('/grouptest', function($app) {
	$app->get('', function($request, $response){
		$response->getBody()->write("Get Empty method");
		return $response;
	});

	$app->put('', function($request, $response){
		$response->getBody()->write("Put Empty method");
		return $response;
	});

	$app->get('/{id}', function($request, $response, $args){
		$id = $args['id'];
		$response->getBody()->write("GET with id = $id");
		return $response;
	});

	$app->post('/ ', function($request, $response){
		$response->getBody()->write("Method Post");
		return $response;
	});
});

//_____________________________________________________________________________________________
// nested Group of Routes (groupes dans le groupe)

$app->group('/API', function($app){
	$app->group('/V1', function($app){
		$app->get('/getuser', function($request, $response){
			echo "getuser V1";
			return $response;
		});
		$app->post('/postuser', function($request, $response){
			echo "Post user V1";
			return $response;
		});
	});

	$app->group('/V2', function($app){
		$app->get('/getuser', function($request, $response){
			echo "getuser V2";
			return $response;
		});
		$app->post('/postuser', function($request, $response){
			echo "Post user V2";
			return $response;
		});
	});
});