<?php

namespace APP\Di;

use APP\Controllers\AuthController;
use App\Repositories\UserRepo;
use APP\Services\AuthService;

class AppModule
{

    static function provideUserRepo(): UserRepo
    {
        return new UserRepo();
    }
    static function provideAuthService(): AuthService
    {
        return new AuthService(self::provideUserRepo());
    }

    static function provideAuthController(): AuthController
    {
        return new AuthController(self::provideAuthService());
    }
}
