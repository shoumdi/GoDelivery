<?php
namespace App\Dto;

class UserDto{
    private ?int $id;
    private string $username;
    private string $email;
    private string $password;
    private RoleDto $role;


    function getRole():RoleDto{
        return $this->role;
    }
}