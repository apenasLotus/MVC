<?php

require __DIR__ . "/vendor/autoload.php";

use App\Http\Router;
use App\Utils\View;
use WilliamCosta\DotEnv\Environment;

/**
 * ! Carrega variáveis de ambiente
 */
Environment::load(__DIR__);

/**
 * ! Define a const da pagina, e inicia o ROUTER
 */
define('URL', getenv('URL'));
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
