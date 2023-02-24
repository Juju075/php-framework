<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\Exception\ResourceNotFound;

class MainController extends AbstractController
{
    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function index()
    {
        echo $this->render('content/home.php', ['cle' => 'smfkj']);
    }
}
