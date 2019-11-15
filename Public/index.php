<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add error middleware
//$app->addErrorMiddleware(true, true, true);


//  Get ANd Post Test
require __DIR__ . '/../API/GetANdPostTest.php';


//Test avec arguments
require __DIR__ . '/../API/ArgumentsAndJsonTest.php';

//Put and delete Resource
require __DIR__ . '/../API/PutDeleteResource.php';

//Multiple Methods
require __DIR__ . '/../API/MultipleMethods.php';


// Optional Segments
require __DIR__ . '/../API/OptionalSegments.php';

// Multiple Optional Segments
require __DIR__ . '/../API/MultipleOptional.php';

// Regular expression test
require __DIR__ . '/../API/RegularExpression.php';


// Group of Routes

require __DIR__ . '/../API/GroupOfRoutes.php';


$app->run();