<?php

namespace App\Exception;

class ResourceNotFound extends  \Exception implements ExceptionInterface
{

    public function __construct($message = 'Resource not found')
    {
        parent::__construct($message = 'Resource not found','500');
    }
}
