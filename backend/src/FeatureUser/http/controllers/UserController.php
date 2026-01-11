<?php

namespace App\FeatureUser\http\controllers;

use App\FeatureUser\domain\services\UserService;
use App\FeatureUser\http\requests\CreateUserRequest;
use App\FeatureUser\infrastructure\mappers\DomainMapper;
use App\shared\http\controllers\Controller;
use Exception;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function createUser(CreateUserRequest $req)
    {
        try {
            $this->userService->createUser(DomainMapper::createUser($req->getData()));
        } catch (Exception $e) {
            return json_encode(['error' => "user already exist"]);
        }
    }
}
