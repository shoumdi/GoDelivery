<?php

namespace App\FeatureAuth\domain\entities;

class ResgisterUser
{
    private string $username;
    private string $email;
    private int $roleId;
    private string $password;

    public function __construct(
        string $username,
        string $email,
        int $roleId,
        string $password,
    ) {}

    public function copy(
        ?string $username = null,
        ?string $email = null,
        ?int $roleId = null,
        ?string $password = null
    ) {
        $this->$username = $username ?? $this->username;
        $this->$email = $email ?? $this->email;
        $this->$roleId = $roleId ?? $this->roleId;
        $this->$password = $password ?? $this->password;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }
}
