<?php

namespace App\Framework\Database;

interface VerbsInterface
{
    public function getName();

    public function __toString(): string;

    public function isValid(): bool;
}
