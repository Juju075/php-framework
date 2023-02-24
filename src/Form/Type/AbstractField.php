<?php

namespace App\Form\Type;

use App\Form\Form;
use App\Framework\Database\SchemaInterface;

abstract class AbstractField
{
    protected Form $form;
    protected ?SchemaInterface $entity;

    public function __construct(SchemaInterface $entity = null)
    {
        $this->entity = $entity;
    }

    public function prepopulateFields(array $fieldsName): Form
    {
        $form = $this->formBuilder();
        $fields = $form->getFields();

        foreach ($fields as $field) {
            foreach ($fieldsName as $item) {
                if ($field->getName() === $item) {
                    $getter = 'get' . ucfirst($item);
                    $value = ($this->entity)->$getter();
                    //verification getter exist
                    $field->setValue($value);
                }
            }
        }
        return $form;
    }
}