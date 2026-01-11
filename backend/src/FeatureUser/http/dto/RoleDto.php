<?php
namespace App\Dto;

class RoleDto{
    private int $id;
    private string $name;
    public function __construct(array $role) {
        $this->id = $role['id'];
        $this->name = $role['name'];
    }
    public function copy(
        ?int $id = null,
        ?string $name = null 
        ){
            return new self([
                'id'=> $id ?? $this->id,
                'name'=> $name ?? $this->name
            ]);
    }
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->name;
    }
}