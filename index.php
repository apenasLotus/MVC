<?php

require __DIR__."/vendor/autoload.php";

use app\Controller\Pages\Home;
use app\Http\Router;

define('URL', 'http://127.0.0.1:8080');

$obRouter = new Router(URL);
echo '<pre>';
print_r($obRouter);
echo '</pre>';exit;

exit;

echo Home::getHome();