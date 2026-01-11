<?php

namespace App\FeatureAuth\http\controllers;

use App\Dto\UserDto;
use App\FeatureAuth\http\requests\LoginRequest;
use App\FeatureAuth\http\requests\RegisterRequest;
use App\FeatureAuth\infrastructure\Mappers\DomainMapper;
use App\Services\AuthService;
use App\shared\http\controllers\Controller;
use App\shared\http\requests\Request;
use App\utils\Mapper;
use DomainException;

class AuthController extends Controller
{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    function register(RegisterRequest $req)
    {
        try {
            $this->authService->register(DomainMapper::registerUser($req->getData()));
        } catch (DomainException $e) {
            return json_encode(["error"=> $e->getMessage()]);
        }
    }

    function login(LoginRequest $req) {

    }

    function logout(Request $req) {}
}
