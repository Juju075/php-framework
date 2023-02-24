<?php

namespace App\Framework\Database;

use DateTimeInterface;

class QueryResolver
{
    /**
     * Property
     * Return getters assuming both (get&set) r
     * @param object $instance
     * @return array
     */
    public static function findAllGetters(object $instance): array
    {
        $methods = get_class_methods($instance);
        $getters = [];
        foreach ($methods as $method) {
            if (strpos($method, 'get') !== 0) {
                continue;
            }
            $setter = 'set' . substr($method, 3);
            if (in_array($setter, $methods)) {
                $getters[] = $method;
            }
        }
        return $getters;
    }

    /**
     * Return [] w keys => values
     * Use getters to retrieve values
     */
    public static function keysValues(object $instance): array
    {
        $getters = QueryResolver::findAllGetters($instance);
        $gettersValues = [];
        foreach ($getters as $getter) {
            if ($instance->$getter() instanceof DateTimeInterface) {
                $dateObjArr = (array)$instance->$getter();
                $gettersValues[$getter] = $dateObjArr['date'];
                var_dump("date value : " . ' ' . $gettersValues[$getter], $getter);
                continue;
            }
            $gettersValues[$getter] = $instance->$getter();
        }
        return self::gettersToSnakeCaseProperties($gettersValues);
    }

    /**
     * Array transformation
     * getterName => value to Name => value
     * Return the value for each getter.
     * @param array $gettersValues
     * @return array
     */
    public static function gettersToSnakeCaseProperties(array $gettersValues): array
    {
        $keysValues = [];
        foreach ($gettersValues as $key => $value) {
            $key = self::camelCaseToSnakeCase(substr($key, 3));
            $keysValues[$key] = $value;
        }
        return $keysValues;
    }

    private static function camelCaseToSnakeCase(string $camelCase): string
    {
        $camelCase = lcfirst($camelCase);
        $data = preg_split('/(?<=\\w)(?=[A-Z])/', $camelCase);
        return strtolower(implode('_', $data));
    }

    public static function params(array $options): string
    {
        $data = null;
        foreach ($options as $key => $value) {
            $data[] = sprintf('%s = %s', $key, $value);
        }
        return implode($data);
    }
}
