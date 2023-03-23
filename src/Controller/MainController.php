<?php

namespace App\Controller;

use App\Exceptions\NotFoundException;
use App\Exceptions\ResourceNotFound;

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
