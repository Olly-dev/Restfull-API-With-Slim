<?php
//Test avec arguments
$app->get('/testargs/{name}/{phone}', function ($request, $response, $args) {
    $name = $args['name'];
    $phone = $args['phone'];
    $response->getBody()->write("Hello $name This is test for args, your phone is $phone");
    return $response;
});

//_____________________________________________________________________________________________
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