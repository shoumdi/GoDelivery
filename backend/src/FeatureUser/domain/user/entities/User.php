<?php
namespace App\Domain\User\Entities;

use App\FeatureUser\interfaces\UserEvents;
use APP\Utils\Constant;

class User{
    private array $events = [];

    public function __construct(
        private ?int $id,
        private string $username,
        private string $email,
        private string $password,
        private Role $role
        )
    {
        $this->id = $id;   
        $this->username = $username;   
        $this->email = $email;   
        $this->password = $password;   
        $this->role = $role;   
    }

    function copy(
        ?int $id = null,
        ?string $username = null,
        ?string $email = null,
        ?string $password = null,
        ?Role $role = null
    ):self{
        return new self(
            id: $id ?? $this->id,
            username: $username ?? $this->username,
            email: $email ?? $this->email,
            password: $password ?? $this->password,
            role: $role ?? $this->role
        );
    }

    function canEdit():bool{
        return Constant::$ADMIN_ID == $this->role->getId();
    }

    function getPassword():string{
        return $this->password;
    }

    function addEvent(UserEvents $event):self{
        $this->events[] = $event;
        return $this;
    }
    public function pullEvents():array{
        $events = $this->events;
        $this->events = [];
        return $events;
    }
    function getRole():Role{
        return $this->role;
    }

    function withPassword():self{

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

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
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}