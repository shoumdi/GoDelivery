<?php

namespace App\FeatureUser\domain\repositories;

use App\Domain\User\Entities\Role;
use App\Domain\User\Entities\User;
use App\FeatureUser\domain\entities\CreateUser;

interface IUserRepo
{
    function save(CreateUser $user): ?User;
    function findById(int $id): ?User;
    function findByEmail(string $email): ?User;
    function findRoleByName(string $role): ?Role;
}
