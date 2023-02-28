<?php

namespace App\Form\Type;

use App\Framework\Form\Form;
use App\Framework\Form\FormTypeInterface;
use App\Framework\Form\Input;
use App\Framework\Form\Label;
use App\Framework\Form\Textarea;

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
