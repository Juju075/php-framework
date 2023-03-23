<?php

namespace App\Framework\Repository;

use App\Entity\Post;
use App\Exceptions\NotFoundException;
use App\Framework\Database\Query;
use PDO;

abstract class AbstractRepository
{
    protected PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    // soit automatique soit manuel

    /**
     * @param array $params
     * @return object
     * @throws NotFoundException
     */
    public function selectOneById(array $params): object
    {
        $query = (new Query())
            ->select()
            ->from($this->getTable())
            ->where($params);

        $request = $this->pdo->prepare($query);
        $request->execute();
        $request->setFetchMode(PDO::FETCH_CLASS, Post::class);
        $item = $request->fetch();
        if($item !== false)
        {
            return $item;
        }
        throw new NotFoundException('inexistant', 404);
    }

    /**
     * @return array
     */
    public function selectAll(): array
    {
        $query = (new Query())
            ->select()
            ->from($this->getTable());

        $request = $this->pdo->prepare($query);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_CLASS, $this->getEntityName());
    }

    public function total(string $table): int
    {
        $query = (new Query())
            ->select('COUNT(id)')
            ->from($table);
        return (int)$this->pdo->query($query)->fetch(PDO::FETCH_NUM)[0];
    }

    public function selectedPage(string $table, int $limit, int $offset): array
    {
        $query = (new Query())
            ->select()
            ->from($table)
            ->limit($limit, $offset);
        $req = $this->pdo->prepare($query);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_CLASS, $this->getEntityName());
    }

    /**
     * @param int $id
     * @return void
     */
    public function remove(int $id)
    {
        $query = (new Query())
            ->delete($id)
            ->from($this->getTable());
    }

}


