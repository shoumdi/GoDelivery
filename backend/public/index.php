<?php

use App\App;


$route = new Route();
include_once './routes/web.php';
$app = App::create()
    ->setRouter($route)
    ->build();

$app->run();
