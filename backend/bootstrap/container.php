<?php

use App\dao\UserDao;
use App\FeatureAuth\http\controllers\AuthController;
use App\FeatureUser\domain\services\UserService;
use App\FeatureUser\http\controllers\UserController;
use App\FeatureUser\infrastructure\persistence\UserRepo;
use App\Services\AuthService;
use App\shared\infrastructure\DataBase;
use Core\EventFlow;

$container->bind(DataBase::class,
    fn()=> new DataBase(
        "mysql",
        "host",
        "go_delivery",
        "root",
        ""
        )
);
$container->bind(UserDao::class,fn($c)=> new UserDao($c->resolve(DataBase::class)));
$container->bind(UserRepo::class,fn($c) =>new UserRepo($c->resolve(UserDao::class)));
$container->bind(EventFlow::class,fn($c) =>new EventFlow());
$container->bind(UserService::class,fn($c) =>new UserService($c->resolve(UserRepo::class),$c->resolve(EventFlow::class)));
$container->bind(UserController::class, fn($c) => new UserController($c->resolve(UserService::class)));
$container->bind(AuthService::class, fn($c) => new AuthService($c->resolve(UserRepo::class)));
$container->bind(AuthController::class, fn($c) => new AuthController($c->resolve(AuthService::class)));
