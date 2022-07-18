<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Utils\View;
use WilliamCosta\DotEnv\Environment;

/**
 * ! Define a constante de URL
 */
define('URL', getenv('URL'));

/**
 * ! Carrega variáveis de ambiente
 */
Environment::load(__DIR__.'/../');

/**
 * ! Define o valor padrão das variáveis
 */
View::init([
    'URL' => URL
]);