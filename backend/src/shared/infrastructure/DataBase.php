<?php

namespace App\shared\infrastructure;

use PDO;

class DataBase
{
    private PDO $pdo;
    public function __construct(
        private string $type,
        private string $host,
        private string $dbname,
        private string $user,
        private string $password,
    ) {
        $this->pdo = new PDO("$type:host=$host;dbname=$dbname;",$user,$password);
    }

    public function pdo():PDO{
        return $this->pdo;
    }
}
