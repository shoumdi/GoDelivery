<?php

abstract class BaseModel
{
    public function __construct(
        protected PDO $pdo
    ) {}
}
