<?php

require __DIR__ . '/includes/app.php';

use App\Http\Router;

/**
 * ! Define a const da pagina, e inicia o ROUTER
 */
$obRouter = new Router(URL);

/**
 * ! Inclui as rotas de páginas
 */
include __DIR__ . '/routes/Pages.php';

/**
 * ! Imprime o response da rota
 */
$obRouter->run()
    ->sendResponse();
