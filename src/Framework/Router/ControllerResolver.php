<?php

namespace App\Framework\Router;

use App\Exception\NotFoundException;
use App\Framework\Container\Container;

/**
 * Responsibility Resolve the Controller
 */
class ControllerResolver
{
    private Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @throws NotFoundException
     */
    public function resolve(?Route $route)
    {
        if ($route === null) {
            throw new NotFoundException();
        }
        $data = $route->getController();
        $action = $data['action'];
        $controller = $this->container->get($data['controllerName']);

        if (isset($data['param'])) {
            $param = $this->container->get($data['param']);
            return $controller->$action($param);
        }
        return $controller->$action();
    }
}