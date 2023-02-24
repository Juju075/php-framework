<?php

namespace App\Framework\Database;

interface ColumnInterface
{
    public function getName();

    public function __toString(): string;

}