<?php

namespace App\Framework\Router;

class Router
{
    /**
     * @var array<Route>
     */
    private array $routes = [];

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function match(string $currentUrl, string $currentMethod): ?Route
    {
        foreach ($this->routes as $route) {
            if (!in_array($currentMethod, $route->getMethods())) {
                continue;
            }

            if ($route->getUrl() === $currentUrl) {
                return $route;
            }

            $isRegex = strpos($route->getUrl(), "/^") !== false;
            if ($isRegex && preg_match($route->getUrl(), $currentUrl) === 1) {
                if($currentMethod !== 'GET'){
                    $method = $_POST['_method'];
                    /**
                     * @var Route $route
                     */
                    $route->setMethod($method)->matchAction($method);
                    return $route;
                }
                $route->setMethod($currentMethod)->matchAction($currentMethod);
                return $route;
            }
        }
        return null;
    }
}
