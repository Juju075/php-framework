<?php

namespace App\Framework\Database;

class SchemaResolver
{
    public static function snakeCaseToCamelCase(string $snake_case): string
    {
        $result = preg_split('/(?=[A-Z])/', $snake_case);
        return strtolower(str_replace('_', '', $snake_case));
    }

    private static function camelCaseToSnakeCase(string $camelCase): string
    {
        $camelCase = lcfirst($camelCase);
        $data = preg_split('/(?<=\\w)(?=[A-Z])/', $camelCase);
        return strtolower(implode('_', $data));
    }

}
