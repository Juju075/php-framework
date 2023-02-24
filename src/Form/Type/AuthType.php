<?php

namespace App\Form\Type;

use App\Form\Form;
use App\Form\Input;
use App\Framework\Form\FormTypeInterface;

class AuthType extends AbstractField implements FormTypeInterface
{
    public function formBuilder(): Form
    {
        $form = new Form();
        $form
            ->add(new Input('text','username'))
            ->add(new Input('password', 'password'));
        return $form;
    }
}