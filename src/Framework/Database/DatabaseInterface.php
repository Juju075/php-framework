<?php

namespace App\Framework\Database;

interface DatabaseInterface
{
    public function __construct(\PDO $pdo);

}