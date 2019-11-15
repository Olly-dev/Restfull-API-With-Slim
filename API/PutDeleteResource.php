<?php
//Put Resource
$app->put('/testput', function($Request, $Response){

	$data = $Request->getParsedBody();
	$username = $data['UserName'];
	$password = $data['Password'];
	$Response->getBody()->write("$username your Password is $password");
	return $Response;

});

//_____________________________________________________________________________________________
//Delete Resource
$app->delete('/testdelete', function($Request, $Response){

	$data = $Request->getParsedBody();
	$username = $data['UserName'];
	$password = $data['Password'];
	$Response->getBody()->write("$username your Password is $password With Delete Test Demo");
	return $Response;

});