<?php

use App\Controllers\AuthController;
use App\FeatureUser\http\controllers\UserController;

$route->get('/index',[UserController::class,'index']);
$route->get('/users',[UserController::class , 'getUsers']);


$route->post('/register',[UserController::class , 'createUser']);
$route->post('/login',[AuthController::class , 'login']);
$route->post('/logout',[AuthController::class , 'logout']);