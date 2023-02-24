<?php

namespace App\Framework\Database;

class CreateTable
{
    private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = new \PDO("mysql:host=localhost;dbname=blog_mvc;charset=utf8", "root", "root");
    }

    function queries(): ?array
    {
        $dataSchema = (new Schema)->getSchema();
        $id = '`id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT, ';

        $queries = [];
        foreach ($dataSchema as $tableName => $columns) {
            $name = sprintf('CREATE TABLE IF NOT EXISTS `%s` (', $tableName);

            $cols = [];
            foreach ($columns as $col) {
                $cols[] = (string)$col;
            }

            $queries[$tableName] = substr(trim($name . $id . implode($cols)), 0, -1) . ');';
        }

        var_dump($queries);
        return $queries;
    }

    function createTable(): void
    {
        foreach ($this->queries() as $query) {
            $request = $this->pdo->prepare($query);
            var_dump($query);
            $request->execute();
        }
    }
}
