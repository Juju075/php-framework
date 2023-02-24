<?php

namespace App\Form\Type;

use App\Form\Form;
use App\Form\Input;
use App\Form\Label;
use App\Framework\Form\FormTypeInterface;

class UserType extends AbstractField implements FormTypeInterface
{
    public function formBuilder(): Form
    {
        $form = new Form();
        $form
            ->add(new Label('Firstname: ', 'firstnameLabel'))
            ->add(new Input('text', 'firstname', ['' => ''], true, 'Firstname'))

            ->add(new Label('Lastname: ','lastnameLabel'))
            ->add(new Input('text', 'lastname', ['' => ''], true, 'Lastname'))

            ->add(new Label('Password: ','passwordLabel'))
            ->add(new Input('password', 'password', ['' => ''], true, 'password'))

            ->add(new Label('Re-type: ','password-verify'))
            ->add(new  Input(
                'password', 'passwordVerify',
                ['' => ''],
                true,
                'password verification'));
        return $form;
    }
}