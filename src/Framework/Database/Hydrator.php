<?php

namespace App\Framework\Database;

use App\Framework\Form\FieldResolver;

/**
 * Only used to store functions
 */
class Hydrator
{

    // form -> object ou array->object
    /**
     * Allow to hydrate any entity
     * only existing setters
     * @param array $dataArray
     * @param string $className
     * @param bool $isEntity
     * @return Object
     */
    public static function hydrate(
        array  $dataArray,
        string $className,
        bool   $isEntity = false
    ): object
    {
        $dataClean = $isEntity ? $dataArray : FieldResolver::ValuesToClean($dataArray);
        $instance = new $className();
        foreach ($dataClean as $key => $value) {
            $setter = 'set' . ucwords($key);
            if (method_exists($instance, $setter)) {
                $instance->$setter($value);
            }
        }
        return $instance;
    }


}

