<?php

namespace App\Entity;

use App\Framework\Database\Column;
use App\Framework\Database\SchemaInterface;

class aaaaaa implements SchemaInterface
{

    public function getColumns(): array
    {
        return [
            new Column('title'),
            new Column('description', 'TEXT'),
            new Column('created_at','DATETIME'),
            new Column('updated_at','DATETIME')
        ];
    }

    public function getTable(): string
    {
        return 'aaaaaa';
    }
}