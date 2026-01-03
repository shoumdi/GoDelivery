<?php

use APP\Controllers\AuthController;
use APP\Controllers\UserController;

$router->get('/',[UserController::class => 'index']);
$router->get('/users',[UserController::class => 'getUsers']);


$router->post('/register',[AuthController::class => 'register']);
$router->post('/login',[AuthController::class => 'login']);
$router->post('/logout',[AuthController::class => 'logout']);