<?php
namespace App\Models;

use APP\Models\User;

class Role{
    private int $id;
    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id  = $id;
        $this->name = $name;
    }

    function getId():int{
        return $this->id;
    }

    function getName():string{
        return $this->name;
    }
}