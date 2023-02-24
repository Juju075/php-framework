<?php

namespace App\Framework\Database;

interface SchemaInterface
{
    public function getTable(): string;
    public function getColumns(): array;
}