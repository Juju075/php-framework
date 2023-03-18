<?php
namespace App\Exceptions;

use App\Enums\ErrorStatusCode;

class ResourceNotFound extends  \Exception implements ExceptionInterface
{

    public function __construct($message = 'Resource not found')
    {
        $code = ErrorStatusCode::HTTP_INTERNAL_SERVER_ERROR;
        if (!in_array(ErrorStatusCode::errors[$code], ErrorStatusCode::errors)) {
            throw new \LogicException();
        }
        parent::__construct($message,$code);
    }
}
