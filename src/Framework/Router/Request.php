<?php

namespace App\Framework\Router;

use App\Exception\NotFoundException;

class Request
{
    private $uri;
    private $method;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getUri()
    {
        return $this->uri;
    }

    //range de 1 a l'infini
    public function getParam(): int
    {
        preg_match('/^\/post\/(\d+)$/', $this->uri, $matches);
        return $matches[1];
    }

    public function getMethod()
    {
        return $this->method;
    }
}
