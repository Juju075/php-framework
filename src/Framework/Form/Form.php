<?php

namespace App\Framework\Form;


session_start();

class Form
{
    public const TOKEN_FIELD_NAME = 'token';

    private string $action;
    private string $method;
    private array $attributes;
    private array $fields = [];
    private string $buttonTitle;
    private Token $token;

    public function __construct
    (
        string $action = '',
        string $method = 'post',
        array  $attributes = [],
        string $buttonTitle = 'Submit'
    )
    {
        $this->action = $action;
        $this->method = $method;
        $this->attributes = $attributes;
        $this->buttonTitle = $buttonTitle;
        $this->token = new Token();
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function add(FieldInterface $field): self
    {
        // Pb duplicate name - possible abscence getName pour un getFor
        if (in_array($field->getName(), array_keys($this->fields))) {
            throw new \LogicException("Duplicate names in HTML form.");
        }

        $this->fields[$field->getName()] = $field;

        if (method_exists($field, 'getType') &&
            $field->getType() === 'file') {
            $this->attributes['enctype'] = 'multipart/form-data';
        }
        return $this;
    }

    public function isSubmitted(): bool
    {
        return ($_SERVER['REQUEST_METHOD'] === 'POST');
    }

    public function isValid(array $data): bool
    {
        if ($_SESSION[form::TOKEN_FIELD_NAME] !== $this->token->getTokenDate()) {
            return false;
        }

        foreach ($_POST as $key => $value) {
            if (in_array($key, array_keys($this->fields))) {
                return true;
            }
        }
        return true;
    }

    public function ifFileExist(): bool
    {
        if ($_FILES['image']['name']) {
            return true;
        }
        return false;
    }

    public function __toString(): string
    {
        $form = [];
        $form[] = sprintf('<form action="%s" method="%s" %s>',
            $this->action,
            $this->method,
            FieldResolver::AttributesToString($this->attributes)
        );

        foreach ($this->fields as $field) {
            $form[] = (string)$field;
        }
        $form[] = sprintf('<input type="hidden"  name="%s"/>', form::TOKEN_FIELD_NAME);
        $form[] = sprintf('<input type="submit" value="%s">', $this->buttonTitle);
        $form[] = '</form>';

        return implode($form);
    }
}