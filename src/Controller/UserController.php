<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\Exception\ResourceNotFound;
use App\Form\Type\UserType;

class UserController extends AbstractController
{
    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function create()
    {
        $form = self::createForm(UserType::class);
        echo $this->render('content/create-user.php', ['form' => (string)$form]);
    }
}