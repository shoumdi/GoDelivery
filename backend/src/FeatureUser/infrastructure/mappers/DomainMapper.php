<?php
namespace App\FeatureUser\infrastructure\mappers;

use App\Domain\User\Entities\User;
use App\FeatureUser\domain\entities\CreateUser;

class DomainMapper {

static function createUser(array $user):CreateUser{
        return new CreateUser(
            username:$user['username'],
            email:$user['email'],
            password:$user['password'],
            roleId:(int)$user['roleId']
        );
    }
    static function toUser(array $user):User{
        return new User(
            username:$user['username'],
            email:$user['email'],
            password:$user['password'],
            roleId:(int)$user['roleId']
        );
    }
}