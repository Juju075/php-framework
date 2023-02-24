<?php

namespace App\Framework\Router;

/**
 * Route model url & method
 * Plusieurs methods []
 * creer mes routes new Route(url,[]);
 * 1 par 1 d'apres ma list l'obj Route est une unite obj
 */
class Route
{
    private string $url;
    private array $methods;
    private array $controller;
    private string $method;

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return Route
     */
    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    //TODO changer le nom 3th argument
    public function __construct(string $url, array $methods, array $controller)
    {
        $this->url = $url;
        $this->methods = $methods;
        $this->controller = $controller;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getMethods(): array
    {
        return $this->methods;
    }

    public function getController(): array
    {
        return $this->controller;
    }

    public function matchAction(string $postedMethod): void
    {
        $type = $this->controller['action'];
        if(is_array($type))
        {
            foreach ($this->controller['action'] as $method => $value) {
                if ($method === $postedMethod) {
                    $this->controller['action'] = $value;
                }
            }
        }
    }
}
