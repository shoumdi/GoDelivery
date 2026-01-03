<?php

namespace App\Repositories;

use App\Models\Role;
use APP\Models\User;

interface IUserRepo
{
    function save(User $user): ?User;
    function findById(int $id): ?User;
    function findByEmail(string $email): ?User;
    function findRoleByName(string $role): ?Role;
}
