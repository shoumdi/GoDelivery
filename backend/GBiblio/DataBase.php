<?php

class DataBase
{
    private static ?PDO $instance = null;
    private function __construct() {}


    static function getInstance(){
        if(self::$instance) return self::$instance;
        self::$instance = new PDO(
            "mysql:host=localhost;dbname=gestion_biblio",
            "root",
            "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        return self::$instance;
    }
}
