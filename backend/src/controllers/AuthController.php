<?php
namespace APP\Controllers;

use APP\Services\AuthService;

class AuthController extends Controller{

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    function register(){
        
    }

    function login(){

    }

    function logout(){

    }
}