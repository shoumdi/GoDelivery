<?php
namespace APP\Controllers;

use APP\Services\AuthService;
use Core\Request;

class AuthController extends Controller{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    function register(){
        $data = Request::getParsedBody();
    }

    function login(){

    }

    function logout(){

    }
}