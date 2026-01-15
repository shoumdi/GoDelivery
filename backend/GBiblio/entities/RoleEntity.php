<?php

class RoleEntity
{
    public function __construct(
        private int $id,
        private string $name,
        private DateTime $date,
    ) {}

    public function canBorrow():bool{
        return $this->name === "Member";
    }
}
