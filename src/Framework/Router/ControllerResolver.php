<?php

namespace App\Framework\Router;

use App\Controller\controllerInterface;
use App\Exceptions\NotFoundException;
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
    public function resolve(?Route $route): ?controllerInterface
    {

        if ($route === null) {
            throw new NotFoundException();
        }

        $controllerSettings = $route->getController();
        $action = $controllerSettings['action'];
        $controller = $this->container->get($controllerSettings['controllerName']);

        if (isset($controllerSettings['param'])) {
            $param = $this->container->get($controllerSettings['param']);
            return $controller->$action($param);
        }
        return $controller->$action();
    }
}