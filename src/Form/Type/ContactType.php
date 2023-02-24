<?php

namespace App\Form\Type;

use App\Form\Form;
use App\Form\Input;
use App\Form\Label;
use App\Form\Textarea;
use App\Framework\Form\FieldInterface;
use App\Framework\Form\FormTypeInterface;

class ContactType extends AbstractField implements FormTypeInterface
{
    public function formBuilder(): Form
    {
        $form = new Form();
        $form
            ->add(new Label('Title','title', ['' => '']))
            ->add(new Input('text', 'object', ['' => ''], true))

            ->add(new Label('Sender','sender', ['' => '']))
            ->add(new Input('text', 'contact', ['' => ''], true, 'Sender'))

            ->add(new Label('Message: ','message', ['' => '']))
            ->add(new Textarea('message1', 'Type your message here'));
        return $form;
    }
}
