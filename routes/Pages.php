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
        return new Response(200, Pages\About::getAbout());
    }
]);

//Rota TESTIMONIES
$obRouter->get('/depoimentos', [
    function ($request) {
        return new Response(200, Pages\Testimony::getTestimonies($request));
    }
]);

//Rota TESTIMONIES (INSERT)
$obRouter->post('/depoimentos', [
    function ($request) {        
        return new Response(200, Pages\Testimony::insertTestimony($request));
    }
]);