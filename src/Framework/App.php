<?php

namespace App\Framework;

use App\Exception\NotFoundException;
use App\Framework\Container\Container;
use App\Framework\Router\Request;
use App\Framework\Router\ControllerResolver;
use App\Framework\Router\Route;
use App\Framework\Router\Router;
use Exception;

final class App
{
    private Container $container;
    private Router $router;
    private ?Route $route = null;

    public function __construct()
    {
        $services = require dirname(__DIR__, 2) . '/config/services.php';
        require_once  dirname(__DIR__, 2) . '/config/const.php';
        $this->container = new Container($services);
        $routes = require dirname(__DIR__, 2) . '/config/routes.php';
        $this->router = new Router($routes);
    }

    public function getContainer(): Container
    {
        return $this->container;
    }

    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * @throws NotFoundException
     * @throws Exception
     */
    public function request()
    {
        $this->route = ($this->router)->match
        (
            (new Request())->getUri(),
            (new Request())->getMethod()
        );

        /**
         * New Service to add @ unique instance
         * @var ControllerResolver $controllerResolver
         */
        $controllerResolver = $this->container->get(ControllerResolver::class);
        $controllerResolver->resolve($this->route);
    }
}
