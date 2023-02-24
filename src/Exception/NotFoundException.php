<?php

namespace App\Exception;

/**
 * Overwrite Exception __construct
 */
class NotFoundException extends \Exception implements ExceptionInterface
{
    public function __construct($message = "Page not found")
    {
        parent::__construct($message, 404);
    }
}