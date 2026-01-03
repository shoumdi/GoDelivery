<?php
namespace APP\Models;

use APP\Utils\Constant;

class User{
    private ?int $id;
    private string $username;
    private string $email;
    private string $password;
    private Role $role;

    public function __construct(
        ?int $id,
        string $username,
        string $email,
        string $password,
        Role $role
        )
    {
        $this->id = $id;   
        $this->username = $username;   
        $this->email = $email;   
        $this->password = $password;   
        $this->role = $role;   
    }

    function canEdit():bool{
        return Constant::$ADMIN_ID == $this->role->getId();
    }

    function getPassword():string{
        return $this->password;
    }
}