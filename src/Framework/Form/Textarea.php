<?php

namespace App\Framework\Form;

class Textarea implements FieldInterface
{
    private string $name;
    private int $row;
    private int $cols;
    private bool $required;
    private ?string $placeholder = null;
    private ?string $value = null;

    public function __construct
    (
        string  $name,
        ?string $placeholder = null,
        int     $row = 5,
        int     $cols = 33,
        bool    $required = false
    )
    {
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->row = $row;
        $this->cols = $cols;
        $this->required = $required;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        $textarea = [];
        $textarea[] = '<textarea ';

        if ($this->placeholder !== null) {
            $textarea[] = 'placeholder="' . $this->placeholder . '"' . ' ';
        }

        $textarea[] = sprintf('name="%s" rows="%s" cols="%s" >', $this->name, $this->row, $this->cols);

        if ($this->getValue() !== null) {
            $textarea[] = $this->getValue();
        }

        $textarea[] = '</textarea>';

        return implode($textarea);
    }
}