<?php

namespace App\Framework\Repository;

use App\Entity\Post;

class PostRepository extends AbstractRepository implements RepositoryInterface
{
    public function getTable(): string
    {
        return 'post';
    }

    public function getEntityName(): string
    {
        return  Post::class;
    }
}