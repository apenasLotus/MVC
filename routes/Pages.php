<?php

use app\Http\Response;
use app\Controller\Pages;


//Rota HOME
$obRouter->get('/',[
    function(){
        return new Response(200,Pages\Home::getHome());
    }
]);

//Rota SOBRE
$obRouter->get('/sobre',[
    function(){
        return new Response(200,Pages\About::getHome());
    }
]);
