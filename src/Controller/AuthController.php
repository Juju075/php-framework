<?php

namespace App\Controller;

use App\Exceptions\NotFoundException;
use App\Exceptions\ResourceNotFound;
use App\Form\Type\AuthType;

class AuthController extends AbstractController implements controllerInterface
{
    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function index()
    {
        $form = $this->createForm(AuthType::class);
        echo $this->render('content/login.php', ['form' => (string)$form]);
    }

    public function logout()
    {
        echo 'you have been logged out';
    }
}