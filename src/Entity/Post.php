<?php

namespace App\Entity;

use App\Framework\Database\Column;
use App\Framework\Database\SchemaInterface;
use App\Framework\Database\SchemaResolver;
use App\Traits\Timestampable;


/**
 * Resolution arrayDb to new Post
 * https://stackoverflow.com/questions/14977115/how-can-i-fetch-correct-datatypes-from-mysql-with-pdo
 * PDO::FETCH_CLASS
 */
class Post implements SchemaInterface
{
    private string $title;
    private string $description;
    private ?string $pictureFileName = null;
    private int $id;

    use Timestampable;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Post
    {
        $this->description = $description;
        return $this;
    }

    public function setPictureFileName(string $pictureFileName): Post
    {
        $this->pictureFileName = $pictureFileName;
        return $this;
    }

    public function getPictureFileName(): ?string
    {
        return $this->pictureFileName;
    }

    /**
     * Needed for db to entity
     * Resolve the right setter
     * @param $colName
     * @param $value
     * @return void
     */
    public function __set($colName, $value): void
    {
        if ($value !== null) {
            $properties = $this->getColumns();
            foreach ($properties as $property => $column) {
                if ($colName === $column->getName()) {
                    $setter = 'set' . ucfirst($property);
                    $this->$setter($value);
                    break;
                }
            }
        }
    }

    public function getColumns(): array
    {
        return [
            'title' => new Column('title', 'VARCHAR', false),
            'description' => new Column('description', 'TEXT', false),
            'pictureFileName' => new Column('picture_file_name', 'VARCHAR', true),
            'createdAt' => new Column('created_at', 'DATETIME', false),
            'updatedAt' => new Column('updated_at', 'DATETIME', true)
        ];
    }

    public function getTable(): string
    {
        return 'post';
    }
}


