<?php

namespace App\Framework\Repository;

interface RepositoryInterface
{
    public function getTable(): string;
    public function getEntityName(): string;
}