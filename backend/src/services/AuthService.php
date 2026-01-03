<?php
namespace APP\Services;

use APP\Models\User;
use App\Repositories\IUserRepo;

class AuthService {
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
        ){
            if($this->userRepo->findByEmail($email)) return false;

            $hashedPass = password_hash($password,PASSWORD_BCRYPT);

            $role = $this->userRepo->findRoleByName($role);

            $user = new User(null,$userName,$email,$hashedPass,$role);

            return $this->userRepo->save($user);
    }

    function login(
        string $email,
        string $password
        ){
            $user = $this->userRepo->findByEmail($email);
            ///user not found fallback
            if(!!$user) return false;
            
            /// user found but wrong pass
            if (password_verify($password,$user->getPassword())) return false;

            /// create jwt
    }

    function logout(
        string $token
    ){

    }
}