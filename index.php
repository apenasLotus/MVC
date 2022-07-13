<?php

require __DIR__."/vendor/autoload.php";

use app\Controller\Pages\Home;
use app\Http\Request;
use app\Http\Response;

$obResponse = new Response(404, 'Olá mundo');
$obResponse->sendResponse();

exit;

echo Home::getHome();