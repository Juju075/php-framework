<?php

namespace App\Framework\Database;

use App\Form\FieldResolver;
use mysql_xdevapi\Exception;
use \PDO;

/**
 * Responsibility build queries
 */
class Query
{
    private const ASC = 'ASC';
    private const DESC = 'DESC';

    private ?string $select;
    private string $from;
    private string $table;
    private string $delete;
    private array $where = [];
    private array $keysValues;
    private int $update;
    private string $column;
    private string $value;
    private string $order_by;
    private int $offset;
    private array $order_by_conditions;
    private string $terms;
    private int $limit;


    public function select(?string $select = '*'): self
    {
        $this->select = $select;
        return $this;
    }

    public function where(array $where = []): self
    {
        $this->where = $where;
        return $this;
    }

    public function from(string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function order_by(string $order_by, array $conditions = [], string $terms = Query::ASC): self
    {
        $this->order_by = $order_by;
        $this->order_by_conditions = $conditions;
        $this->terms = $terms;
        return $this;
    }

    public function limit(int $limit, int $offset = 0): self
    {
        $this->limit = $limit;
        $this->offset = $offset;
        return $this;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;
        return $this;
    }

    public function insert(string $table, array $keysValues): self
    {
        $this->table = $table;
        $this->keysValues = $keysValues;
        return $this;
    }

    public function update(int $id, string $column, string $value): self
    {
        $this->update = $id;
        $this->column = $column;
        $this->value = $value;
        return $this;
    }

    public function delete(string $delete): self
    {
        $this->delete = $delete;
        return $this;
    }

    public function __toString(): string
    {
        //SELECT ok
        $select = [];
        $from = [];

        if (isset($this->from)) {
            $from = ' FROM ' . $this->from;
        }

        $where = null;
        if (isset($this->where) && !empty($this->where)) {
            $params = QueryResolver::params($this->where);
            $where = 'WHERE ' . $params;
        }

        $string = [];
        if (isset($this->select)) {
            $string[] = 'SELECT ' . $this->select . $from;
            if (isset($this->where)) {
                $string[] = ' ' . $where;
            }
            if (isset($this->order_by)) {
                $string[] = 'ORDER BY' . $this->order_by;
            }
            if (isset($this->limit)) {
                $string[] = 'LIMIT' . ' ' . $this->limit . ' ' . 'OFFSET' . ' ' . $this->offset;
            }
            return implode($string);
        }

        //INSERT ok
        if (isset($this->keysValues)) {
            $columns = [];
            $values = [];

            foreach ($this->keysValues as $key => $value) {
                $columns[] = $key . ', ';
                $values[] = ':' . $key . ', ';
            }
            $separatorColumns = substr(implode($columns), 0, -2);
            $separatorValues = substr(implode($values), 0, -2);

            $insert[] = 'INSERT INTO ' . $this->table;
            $insert[] = ' (' . $separatorColumns . ')' . ' VALUES ' . '(' . $separatorValues . ')';
            return implode($insert);
        }

        if (isset($this->update)) {
            $update = 'UPDATE ' . $this->table . 'SET' . 'col' . '=' . 'value';
            return $update . $where;
        }

        if (isset($this->delete)) {
            $delete = 'DELETE FROM ' . $this->delete;
            return $delete . ' ' . $where;
        }
        throw new Exception("Syntax error", 500);
    }
}



