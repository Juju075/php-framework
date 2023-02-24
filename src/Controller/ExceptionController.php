<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\Exception\ResourceNotFound;

/**
 * Control all Exceptions action
 */
class ExceptionController extends AbstractController
{
    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function pageNotFound()
    {
        header("HTTP/1.0 404 Not Found");
        echo $this->render('404.php');
    }

    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function resourceNotFound()
    {
        header("HTTP/1.0 500 Not Found");
        echo $this->render('500.php');
    }
}
