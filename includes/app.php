<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Utils\View;
use WilliamCosta\DotEnv\Environment;
use App\Database\Database;

/**
 * ! Carrega variáveis de ambiente
 */
Environment::load(__DIR__ . '/../');

/**
 * ! Define as configurações de Banco de Dados
 */
Database::config([
    getenv('driver'),
    getenv('host'),
    getenv('name'),
    getenv('user'),
    getenv('pass'),
    getenv('port')]
);

/**
 * ! Define a constante de URL
 */
define('URL', getenv('URL'));

/**
 * ! Define o valor padrão das variáveis
 */
View::init([
    'URL' => URL
]);
