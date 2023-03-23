<?php

namespace App\Controller;

use App\Exceptions\NotFoundException;
use App\Exceptions\ResourceNotFound;
use App\Form\Type\UserType;

class UserController extends AbstractController implements controllerInterface
{
    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function index()
    {
        $form = self::createForm(UserType::class);
        echo $this->render('content/create-user.php', ['form' => (string)$form]);
    }

}