<?php

require __DIR__."/vendor/autoload.php";

use app\Controller\Pages\Home;
use app\Http\Router;
use app\Http\Response;

define('URL', 'http://127.0.0.1:8080');

$obRouter = new Router(URL);

//Rota HOME
$obRouter->get('/',[
    function(){
        return new Response(200,Home::getHome());
    }
]);
