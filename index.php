<?php

require __DIR__."/vendor/autoload.php";

use app\Http\Router;

/**
 * ! Define a const da pagina, e já usa a mesma
 */
define('URL', 'http://127.0.0.1:8080');
$obRouter = new Router(URL);

/**
 * ! Inclui as rotas de páginas
 */
include __DIR__.'/routes/Pages.php';

/**
 * ! Imprime o response da rota
 */
$obRouter->run()->sendResponse();