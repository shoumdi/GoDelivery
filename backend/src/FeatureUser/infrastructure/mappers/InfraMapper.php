<?php
namespace App\FeatureUser\infrastructure\mappers;

use App\entities\UserEntity;
use App\FeatureUser\domain\entities\CreateUser;

class InfraMapper{

    static function toUser(CreateUser $user):UserEntity{
        return (new UserEntity())
            ->setUsername($user->getUsername())
            ->setEmail($user->getEmail())
            ->setPassword($user->getPassword())
            ->setRoleId($user->getRoleId());
    }
}