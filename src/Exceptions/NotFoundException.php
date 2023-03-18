<?php

namespace App\Exceptions;

use App\Enums\ErrorStatusCode;
use Exception;

/**
 * Overwrite Exception
 * parent::__construct
 */
class NotFoundException extends Exception implements ExceptionInterface
{
    public function __construct($message = "Page not found")
    {
        $code = ErrorStatusCode::HTTP_NOT_FOUND;
        if (!in_array(ErrorStatusCode::errors[$code], ErrorStatusCode::errors)) {
            throw new \LogicException();
        }
        parent::__construct($message, $code);
    }
}