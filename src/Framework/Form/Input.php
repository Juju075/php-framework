<?php

namespace App\Framework\Form;

/**
 * Nouvelle fonction array_map()
 */
class Input implements FieldInterface
{
    private string $type;
    private string $name;
    private array $attributes;
    private bool $required;
    private Label $label;
    private string $placeHolder;
    private ?string $value = null;

    //TODI
    //->add('zipcode', TextType::class,
    //['attr'=>
    //['class'=>'form-control'],
    //'label'=>'Zipcode'
    //])
    public function __construct(
        string $type,
        string $name,
        array  $attributes = [],
        bool   $required = false
    )
    {
        $this->type = $type;
        $this->name = $name;
        $this->attributes = $attributes;
        $this->required = $required;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPlaceHolder(string $placeHolder): void
    {
        $this->placeHolder = $placeHolder;
    }

    public function getPlaceHolder(): string
    {
        return $this->placeHolder;
    }

    public function __toString(): string
    {
        $attributes = [];
        if (isset($this->attributes) && !empty($this->attributes)) {
            $attributes[] = FieldResolver::AttributesToString($this->attributes);
        }

        if ($this->required === true) {
            $attributes[] = 'required';
        }

        $Input[] = sprintf('<input type="%s" name="%s"', $this->type, $this->name);

        if ($this->getValue() !== null) {
            $Input[] = ' value="' . $this->getValue() . '"';
        }

        $Input[] = " " . implode(' ', $attributes) . '>';
        return implode($Input);
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
}