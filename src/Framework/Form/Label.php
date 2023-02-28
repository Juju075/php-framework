<?php

namespace App\Framework\Form;

class Label implements FieldInterface
{
    private string $Legend;
    private ?string $name;
    private array $attributes;

    public function __construct(string $Legend, string $name , array $attributes = [])
    {
        $this->Legend = $Legend;
        $this->name = $name;
        $this->attributes = $attributes;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function __toString(): string
    {
        $label = [];
        $label[] = sprintf(
            '<label for="%s" %s>%s</label>',
            $this->name,
            FieldResolver::AttributesToString($this->attributes), // TODO c'est tout cassé
            $this->Legend
        );
        return implode($label);
    }


    public function getValue(): string
    {
        // TODO: Implement getValue() method.
        return "";
    }

    public function setValue(string $value): FieldInterface
    {
        // TODO: Implement setValue() method.
    }
}