<?php

namespace App\dao;

use App\entities\UserEntity;
use App\shared\infrastructure\DataBase;

class UserDao
{

    public function __construct(
        private DataBase $db
    ) {}

    function insert(UserEntity $entity): UserEntity
    {
        $stmt = $this->db->pdo()->prepare('INSERT INTO TABLE users("username","email","password","role_id") 
            VALUE(:username,:email,:password,:roleId)');
        return $stmt->execute(
            [
                "username" => $entity->getEmail(),
                "email" => $entity->getEmail(),
                "password" => $entity->getPassword(),
                "roleId" => $entity->getRoleId()
            ]
        ) ? $entity->setId($this->db->pdo()->lastInsertId()) : null;
    }
}
