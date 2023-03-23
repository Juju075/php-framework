<?php

namespace App\Framework\Router;

use App\Exceptions\NotFoundException;

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

    public function getParam(): int
    {
        $regex = '/^\/post\/(\d+)$/'; //TODO ?<url>
        $uri = $this->uri;
        preg_match($regex, $uri, $matches);
        return $matches[1]; //TODO clean code: naming subpatterns $matches['url']
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}
