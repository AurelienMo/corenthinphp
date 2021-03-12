<?php

namespace App\Repository;

abstract class AbstractRepository
{
    /** @var \PDO|null */
    protected $db;

    public function __construct()
    {
        if (is_null($this->db)) {
            $config = require_once __DIR__.'/../../config/db.local.php';
            $this->db = new \PDO(
                'mysql:host=172.19.0.2:dbname='.$config['dbname'],
                $config['user'],
                $config['password']
            );
        }
    }

    abstract public function getTableName(): string;

    public function findAll()
    {
        $query = "SELECT * FROM {$this->getTableName()}";
        $statement = $this->db->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }
}
