<?php
namespace App\Exceptions;

use App\Enums\ErrorStatusCode;

class ResourceNotFound extends  \Exception implements ExceptionInterface
{

    public function __construct($message = 'Resource not found')
    {
        parent::__construct($message,ErrorStatusCode::HTTP_INTERNAL_SERVER_ERROR);
    }
}
