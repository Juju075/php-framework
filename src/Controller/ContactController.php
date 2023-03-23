<?php

namespace App\Controller;

use App\Exceptions\NotFoundException;
use App\Exceptions\ResourceNotFound;
use App\Form\Type\ContactType;

class ContactController extends AbstractController
{
    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function index()
    {
        $form = self::createForm(ContactType::class);
        echo $this->render('content/contact.php', ['form' => (string)$form]);
    }
}
