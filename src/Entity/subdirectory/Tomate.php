<?php

namespace App\Entity\subdirectory;

use App\Framework\Database\Column;
use App\Framework\Database\SchemaInterface;

class Tomate implements SchemaInterface
{

    public function getColumns(): array
    {
        return [
            new Column('plat'),
            new Column('recette', 'TEXT'),
            new Column('created_at','DATETIME'),
            new Column('updated_at','DATETIME')
        ];
    }

    public function getTable(): string
    {
        return 'tomate';
    }
}