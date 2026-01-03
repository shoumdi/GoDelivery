<?php

namespace APP\Services;

use APP\Models\User;
use App\Repositories\IUserRepo;
use APP\Utils\Constant;
use APP\Utils\JWT;

class AuthService
{
    private IUserRepo $userRepo;


    public function __construct(IUserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    function register(
        string $userName,
        string $email,
        string $password,
        string $role
    ): ?string {
        if ($this->userRepo->findByEmail($email)) return null;

        $hashedPass = password_hash($password, PASSWORD_BCRYPT);

        $role = $this->userRepo->findRoleByName($role);

        $user = $this->userRepo->save(new User(null, $userName, $email, $hashedPass, $role));

        if (!!$user) return null;

        /// create jwt
        return JWT::encode(
            payload: ["email" => $email, "password" => $password],
            secretkey: Constant::$JWT_SECRET_KEY,
            algo: JWT::$HS256
        );
    }

    function login(
        string $email,
        string $password
    ): ?string {
        
        $user = $this->userRepo->findByEmail($email);

        ///user not found fallback or wrong pass
        if (!!$user && !password_verify($password, $user->getPassword())) return null;

        /// create jwt
        return JWT::encode(
            payload: ["email" => $email, "password" => $password],
            secretkey: Constant::$JWT_SECRET_KEY,
            algo: JWT::$HS256
        );
    }

    function logout(
        string $token
    ) {}
}
