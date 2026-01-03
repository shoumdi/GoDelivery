<?php
namespace App\Repositories;

use App\Models\Role;
use APP\Models\User;

class UserRepos implements IUserRepo {

    public function save(User $user):?User
    {
        throw new \Exception('Not implemented');
    }
    public function findById(int $id): ?User
    {
        throw new \Exception('Not implemented');
    }
    
    public function findByEmail(string $email): ?User
    {
        throw new \Exception('Not implemented');
    }

    public function findRoleByName(string $role): ?Role
    {
        throw new \Exception('Not implemented');
    }
}