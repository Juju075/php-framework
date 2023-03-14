<?php

namespace App\Exception;

abstract class AbstractErrorCode
{
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_FORBIDDEN = 503;
    public const HTTP_INTERNAL_SERVER_ERROR = 500;
}