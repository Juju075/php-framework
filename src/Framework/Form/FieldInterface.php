<?php

namespace App\Framework\Form;

interface FieldInterface
{
    public function getName(): string;
    public function __toString(): string;

    public function setValue(string $value): self;
    public function getValue(): ?string;
}