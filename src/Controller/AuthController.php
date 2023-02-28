<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\Exception\ResourceNotFound;
use App\Form\Type\AuthType;

class AuthController extends AbstractController
{
    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function login()
    {
        $form = $this->createForm(AuthType::class);
        echo $this->render('content/login.php', ['form' => (string)$form]);
    }

    public function logout()
    {
        echo 'you have been logged out';
    }
}