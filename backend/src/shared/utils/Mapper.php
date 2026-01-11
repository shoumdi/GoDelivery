<?php
namespace App\utils;

use App\Dto\RoleDto;
use App\Dto\UserDto;
use App\entities\UserEntity;
use App\Models\Role;
use APP\Models\User;

class Mapper {

    static function toUser(UserDto $user):User{
        return new User(
            id:$user['id'],
            username:$user['id'],
            email:$user['id'],
            password:$user['id'],
            role: self::toRole($user->getRole())
        );
    }
    static function toRoleDto(Role $role):RoleDto{
        new RoleDto([]);
    }

    static function toRole(RoleDto $dto):Role{
        new Role(
            id:$dto->getId(),
            name:$dto->getName()
        );
    }

    static function toUserEntity(User $user):UserEntity{
        return new UserEntity(
            id: $user->getId(),
            username: $user->getUsername(),
            email: $user->getEmail(),
            password: $user->getPassword(),
            roleId: $user->getRole()->getId()
        );
    }

    static function fromUserEntity(UserEntity $user):User{
        return new User(
            id: $user->getId(),
            username: $user->getUsername(),
            email: $user->getEmail(),
            password: $user->getPassword(),
            role: $user->getRole()->getId()
        );
    }
}