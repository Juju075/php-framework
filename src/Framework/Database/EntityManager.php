<?php

namespace App\Framework\Database;

//Entities are objects with identity
use PDOStatement;

/**
 * The reason it's split into two methods is to help with batch data loading...
 * persist() - multiple instanceOf
 * flush() - send to db
 */
class EntityManager implements DatabaseInterface
{
    private ?\PDO $pdo;
    private PDOStatement $request;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createTable()
    {
        new Schema();
    }

    public function persist(object $object)
    {
        $keysValues = QueryResolver::keysValues($object);
        $tableName = strtolower(substr(get_class($object), strrpos(get_class($object), '\\') + 1));
        $query = (new Query())->insert($tableName, $keysValues);
        $this->request = $this->pdo->prepare($query);

        foreach ($keysValues as $key => $value) {
            $this->request->bindParam($key, $keysValues[$key]);
        }
    }

    public function flush(): bool
    {
        // not flush if title already exist (duplicate)
        return $this->request->execute();
    }

    public function getLastId()
    {
        return $this->pdo->lastInsertId();
    }

    private function _debug_sql(): void
    {
        $sqlCmd = 'INSERT INTO post (title, description, picture_file_name, created_at, updated_at) '
            . 'VALUES (:title, :description, :picture_file_name, :created_at, :updated_at)';

        $req = $this->pdo->prepare($sqlCmd);
        $title = "Coucoutitle2";
        $desc = "Coucoudesc2";
        $pic = "NULL";
        $createdat = (new \DateTime())->format("Y-m-d");
        $updatedat = null;

        $req->bindParam(':title', $title);
        $req->bindParam(':description', $desc);
        $req->bindParam(':picture_file_name', $pic);
        $req->bindParam(':created_at', $createdat);
        $req->bindParam(':updated_at', $updatedat);

        $req->execute();
    }

    public function removeInDb(string $entityName, int $id): void
    {
        $query = new Query();
        $query->delete($entityName)
            ->where(['id' => $id]);
    }
}
