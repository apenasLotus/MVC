<?php

use App\Http\Response;
use App\Controller\Pages;


//Rota HOME
$obRouter->get('/', [
    function () {
        return new Response(200, Pages\Home::getHome());
    }
]);

//Rota SOBRE
$obRouter->get('/sobre', [
    function () {
        return new Response(200, Pages\About::getHome());
    }
]);

//Rota DINÂMICA
$obRouter->get('/sobre/{idPagina}', [
    function ($idPagina) {
        return new Response(200, $idPagina);
    }
]);
