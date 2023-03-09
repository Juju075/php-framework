<?php

namespace App\Exception;

use Exception;

/**
 * Overwrite Exception
 * parent::__construct
 */
class NotFoundException extends Exception implements ExceptionInterface
{
    public function __construct($message = "Page not found")
    {
        parent::__construct($message, AbstractErrorCode::HTTP_NOT_FOUND);
    }
}