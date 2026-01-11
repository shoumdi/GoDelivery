<?php
namespace App\FeatureUser\domain\entities;

class CreateUser{
    private string $username;
    private string $email;
    private int $roleId;
    private string $password;

    public function __construct(
        string $username,
        string $email,
        int $roleId,
        string $password,
    ) {
        $this->$username = $username;
        $this->$email = $email;
        $this->$roleId = $roleId;
        $this->$password = $password;
    }

    public function copy(
        ?string $username = null,
        ?string $email = null,
        ?int $roleId = null,
        ?string $password = null
    ):self {
        $this->$username = $username ?? $this->username;
        $this->$email = $email ?? $this->email;
        $this->$roleId = $roleId ?? $this->roleId;
        $this->$password = $password ?? $this->password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of roleId
     */ 
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }
}