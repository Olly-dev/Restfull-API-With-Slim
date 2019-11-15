<?php
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

//_____________________________________________________________________________________________
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
