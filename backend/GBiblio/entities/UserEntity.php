<?php

class UserEntity{
    private int $id;
    private string $username;
    private string $password;
    private RoleEntity $role;

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}