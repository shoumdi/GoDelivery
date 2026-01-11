<?php

use Core\App;
use Core\Container;
use Core\Route;


require dirname(__DIR__) . '/vendor/autoload.php';



$route = new Route();
$container = new Container();
require dirname(__DIR__) . '/routes/web.php';
require dirname(__DIR__) . '/bootstrap/container.php';
$app = App::create()
    ->setRouter($route)
    ->setContainer($container)
    ->build();

$app->run();
