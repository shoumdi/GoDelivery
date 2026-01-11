<?php

namespace Core;

class Response {
    private int $statusCode = 200;
    private string $body = '';
    public function __construct()
    {
    }

    /**
     * Set the value of statusCode
     *
     * @return  self
     */ 
    public function withStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }


    /**
     * Set the value of body
     *
     * @return  self
     */ 
    public function withBody($body)
    {
        $this->body = $body;

        return $this;
    }

    public function send(){
        http_response_code($this->statusCode);
        echo $this->body;
    }
}
