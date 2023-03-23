<?php
declare(strict_types=1);
namespace App\Framework\Container;


/**
 * Fetching and resolve arguments
 * eg: services, params
 */
class Container implements ContainerInterface
{
    private array $services;
    private array $entries;

    public function __construct(array $services)
    {
        $this->services = $services;
    }


    public function get($id)
    {
        if ($this->has($id) === false && !$this->services[$id]($this) instanceof \PDOException) {
            $this->entries[$id] = $this->services[$id]($this);
        }elseif ($this->services[$id]($this) instanceof \PDOException)
        {
            echo'Exception PDO detected';
        }
        return $this->entries[$id];
    }

//    public function get($id)
//    {
//        if ($this->has($id)) {
//            $this->entries[$id] = $this->services[$id]($this);
//        }
//        return $this->entries[$id];
//    }



    public function has($id): bool
    {
        if (!isset($this->entries[$id])) {
            return false;
        }
        return true;
    }

//    public function has($id): bool
//    {
//        if (!isset($this->entries[$id])) {
//            return true;
//        }
//        return false;
//    }

}