<?php

namespace App\Form\Type;

use App\Framework\Form\Form;
use App\Framework\Form\FormTypeInterface;
use App\Framework\Form\Input;

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