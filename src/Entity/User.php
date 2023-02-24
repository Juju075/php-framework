<?php

namespace App\Entity;

use App\Framework\Database\Column;
use App\Framework\Database\SchemaInterface;

class User implements SchemaInterface
{

    public function getColumns(): array
    {
        return [
            new Column('firstname'),
            new Column('lastname'),
            new Column('email'),
            new Column('password'),
            new Column('created_at', 'DATETIME'),
            new Column('updated_at', 'DATETIME')
        ];
    }

    public function getTable(): string
    {
        return 'user';
    }
}