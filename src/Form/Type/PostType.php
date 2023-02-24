<?php

namespace App\Form\Type;

use App\Entity\Post;
use App\Form\Form;
use App\Form\Input;
use App\Form\Label;
use App\Form\Textarea;
use App\Framework\Form\FormTypeInterface;

/**
 * Reusable Form
 */
class PostType extends AbstractField implements FormTypeInterface
{
    public function formBuilder(): Form
    {
        $this->form = new Form('', 'post', ['attribute' => 'test'],
            'Send');
        $this->form
            ->add(new Label('Title: ', 'titleLabel', ['' => '']))
            ->add(new Input('text', 'title', [
                'id' => 'target',
                'class' => 'text-field'
            ],))
            ->add(new Label('Description: ', 'descriptionLabel'))
            ->add(new Textarea('description', 'Type your description here'))
            ->add(new Input('file', 'image', ['id' => 'avatar', 'accept' => 'image/png, image/jpeg']));

        return $this->form;
    }

    public function getEntity(): string
    {
        return Post::class;
    }
}

