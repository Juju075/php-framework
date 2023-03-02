<?php

namespace App\Framework\Database;
use App\Entity\Post;

class Schema
{
    public ?array $listing;
    private array $dataSchema = [];

    public function __construct()
    {
        $this->defineTablesAndColumns();
    }

    public function getSchema() : array
    {
        return $this->dataSchema;
    }

    /**
     * Get all tables names from Entity directory.
     * @return void
     */
    public function defineTablesAndColumns(): void
    {
        $tables = [];
        $this->listing = DirectoryResolver::getAllFilesInSubdirectories(ENTITY_DIRECTORY, ['php']);
        $tables = DirectoryResolver::getClassNameAndNamespace($this->listing);

        foreach ($tables as $entity => $namespace)
        {
            $string = '\\' . $namespace . '\\' . $entity;
            $entity = new $string();
            if (method_exists($entity, 'getColumns')) {
                $this->dataSchema[$entity->getTable()] = $entity->getColumns();
            } else {
                throw new \LogicException("implementation of getColumns() is missing in $namespace", 500);
            }
        }
        //var_dump($this->dataSchema);
    }
}



