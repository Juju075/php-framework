<?php

namespace App\Controller;

use App\Exceptions\NotFoundException;
use App\Exceptions\ResourceNotFound;

/**
 * Control all Exceptions action
 */
class ExceptionController extends AbstractController
{
    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function pageNotFound(): void
    {
        header("HTTP/1.0 404 Not Found");
        echo parent::render('404.php');
    }

    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function resourceNotFound(): void
    {
        header("HTTP/1.0 500 Not Found");
        echo parent::render('500.php');
    }

    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function pdoException(): void
    {
        header("HTTP/1.0 500 Not Found");
        echo parent::render('/pdo-exception.php');
    }
}
