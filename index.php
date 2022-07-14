<?php

require __DIR__ . "/vendor/autoload.php";

use app\Http\Router;
use App\Utils\View;

/**
 * ! Define a const da pagina, e inicia o ROUTER
 */
define('URL', 'http://127.0.0.1:8080');
$obRouter = new Router(URL);

/**
 * ! Define o valor padrão das variáveis
 */
View::init([
    'URL' => URL
]);

/**
 * ! Inclui as rotas de páginas
 */
include __DIR__ . '/routes/Pages.php';

/**
 * ! Imprime o response da rota
 */
$obRouter->run()
    ->sendResponse();
