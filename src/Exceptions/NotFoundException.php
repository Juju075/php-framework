<?php

namespace App\Exceptions;

use Exception;

/**
 * Overwrite Exception
 * parent::__construct
 */
class NotFoundException extends Exception implements ExceptionInterface
{
    public function __construct($message = "Page not found")
    {
        $code = AbstractErrorCode::HTTP_NOT_FOUND;
        if (!in_array(AbstractErrorCode::allErrorsCode[$code], AbstractErrorCode::allErrorsCode)) {
            throw new \LogicException();
        }
        parent::__construct($message, $code);
    }
}