<?php

namespace App\Framework\Repository;

use App\Entity\User;

class UserRepository extends AbstractRepository
{

    public function getTable(): string
    {
        return 'user';
    }

    public function getEntityName(): string
    {
        return User::class;
    }
}