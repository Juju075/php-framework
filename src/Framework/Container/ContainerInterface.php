<?php

namespace App\Framework\Container;

/**
 * Required by PSR11: Container interface
 * The goal set by ContainerInterface is to standardize how frameworks and
 * libraries make use of a container to obtain objects and parameters
 * (called entries in the rest of this document).
 * https://www.php-fig.org/psr/psr-11/
 */
interface ContainerInterface
{
    /**
     * Specification 1.1.2
     * The Psr\Container\ContainerInterface exposes two methods: get and has.
     * entry identifier is any PHP-legal string of at least one character
     * that uniquely identifies an item within a container
     */
    public function get($id);

    public function has(string $id): bool;
}