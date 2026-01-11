<?php

namespace App\Services;

use App\Dto\UserDto;
use App\FeatureAuth\domain\entities\ResgisterUser;
use APP\Models\User;
use App\Repositories\IUserRepo;
use APP\Utils\Constant;
use APP\Utils\JWT;
use App\utils\Mapper;
use DomainException;

class AuthService
{
    private IUserRepo $userRepo;


    public function __construct(IUserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    function register(
        ResgisterUser $user
    ): ?ResgisterUser {

        if ($this->userRepo->findByEmail($user->getEmail())) throw new DomainException("Email already exists");

        $user = $this->userRepo->save(
            $user->copy(password: password_hash($user['password'],PASSWORD_BCRYPT))
        );
        return $user;
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
