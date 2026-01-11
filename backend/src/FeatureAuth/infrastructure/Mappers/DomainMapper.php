<?php
namespace App\FeatureAuth\infrastructure\Mappers;

use App\FeatureAuth\domain\entities\ResgisterUser;

class DomainMapper{

    static function registerUser(array $user):ResgisterUser{
        return new ResgisterUser(
            username:$user['username'],
            email:$user['email'],
            password:$user['password'],
            roleId:(int)$user['roleId']
        );
    }
}