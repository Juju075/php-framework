<?php

namespace App\Exceptions;

abstract class Enums
{
    public const HTTP_NOT_FOUND = 404;
    public const HTTP_FORBIDDEN = 503;
    public const HTTP_INTERNAL_SERVER_ERROR = 500;

    public const allErrorsCode = [
        self::HTTP_NOT_FOUND => 404,
        self::HTTP_FORBIDDEN => 503,
        self::HTTP_INTERNAL_SERVER_ERROR => 500
    ];
}