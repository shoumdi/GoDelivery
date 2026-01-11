<?php
namespace App\shared\http\requests;

abstract class Request {
    private array $data;

 function getData():array{
        return $this->data;
    }

}