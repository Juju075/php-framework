<?php
namespace App\Framework\Database;

class Entity
{
    /**
     * Resolve the right setter
     *
     * @param $entity
     * @param $colName
     * @param $value
     * @return void
     */
    public function __set($entity, $colName, $value): void
    {
        if ($value !== null) {
            $properties = $entity->getColumns();
            foreach ($properties as $property => $column) {
                if ($colName === $column->getName()) {
                    $setter = 'set' . ucfirst($property);
                    $this->$setter($value);
                    break;
                }
            }
        }
    }
}
