<?php

namespace App\Framework\Container;

/**
 * Fetching and resolve arguments
 * eg: services, params
 */
class Container implements ContainerInterface
{
    private array $services;
    private array $entries;

    public function __construct(array $services)
    {
        $this->services = $services;
    }

    public function get($id)
    {
        if (!isset($this->entries[$id])) {
            $this->entries[$id] = $this->services[$id]($this);
        }
        return $this->entries[$id];
    }

    public function has($id): bool
    {
        // TODO: Implement has() method.
    }
}