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
        $code = Enums::HTTP_NOT_FOUND;
        if (!in_array(Enums::allErrorsCode[$code], Enums::allErrorsCode)) {
            throw new \LogicException();
        }
        parent::__construct($message, $code);
    }
}