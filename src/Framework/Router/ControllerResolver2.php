<?php

namespace App\Framework\Router;

use App\Exception\NotFoundException;
use App\Framework\Container\Container;

/**
 * Responsibility Resolve the Controller
 */
class ControllerResolver2
{
    private Container $container;
    private object $controller;
    private string $action;
    private array $arguments = [];
    private array $argumentsParam = [];


    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Resolve controller / action / arguments
     * @throws NotFoundException
     */
    public function resolve(?Route $route)
    {
        if ($route === null) {
            throw new NotFoundException();
        }

        $data = $route->getController();
        $this->controller = $this->container->get($data['controllerName']);
        $this->action = $data['action'];

        // [Arguments] resolved!
        foreach ($data as $index => $item) {
            if ($index !== 'controllerName' || $index !== 'action') {
                $this->arguments[$index] = $this->container->get($data[$item]);
            }
        }
        $this->executeController();
    }

    /**
     * @return void
     */
    private function executeController()
    {
        $argumentList = self::argumentsListGenerator();
        $this->controller->$this->action(... $argumentList);
    }

    //PHP 8 list of function arguments
    //Argument a nombre variable.
    //https://www.php.net/manual/fr/functions.arguments.php
    private function argumentsListGenerator(): array
    {
        $argumentsList = func_get_args();
        foreach ($this->arguments as $index => $argument) {
            $argumentsList[] = $argument;
        }
        return $argumentsList;
    }
}