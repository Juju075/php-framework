<?php

namespace App\Framework\Database;

class Column implements ColumnInterface
{
    public const VARCHAR = 'VARCHAR';
    public const TEXT = 'TEXT';
    public const DATETIME = 'DATETIME';
    public const DEFAULT = 'DEFAULT';
    public const CURRENT_TIMESTAMP = 'CURRENT_TIMESTAMP';

    private string $type;
    private int $length;
    private string $name;
    private string $collation;
    private bool $nullable;
    private ?string $default;

    public function __construct(
        string  $name,
        string  $type = Column::VARCHAR,
        bool    $nullable = false,
        int     $length = 255,
        ?string $default = null,
        string  $collation = 'utf8mb4_unicode_ci'
    )
    {
        $this->type = $type;
        $this->length = $length;
        $this->name = $name;
        $this->collation = $collation;
        $this->nullable = $nullable;
        $this->default = $default;
    }

    public function __toString(): string
    {
        $nullableParam = $this->nullable ? 'NULL' : 'NOT NULL';
        return sprintf(
            '`%s` %s %s,'
            ,
            $this->name,
            $this->queryResolver(),
            //'COLLATE'.' '.$this->collation,
            $nullableParam
        );
    }

    public function queryResolver(): ?string
    {
        switch ($this->type) {
            case 'VARCHAR':
                return Column::VARCHAR . '(' . $this->length . ')';

            case 'TEXT':
                return Column::TEXT . '(' . $this->length . ')';

            case 'DATETIME': //options: si none DEFAULT | CURRENT_TIMESTAMP
                if ($this->default !== null) {
                    return Column::DATETIME . ' ' . $this->default;
                }
                return Column::DATETIME;
            default:
                throw new \LogicException(
                    "Please insure to select one of available option $this->type is not recognized"
                    , 500);
        }
    }

    public function getName(): string
    {
        return $this->name;
    }
}
