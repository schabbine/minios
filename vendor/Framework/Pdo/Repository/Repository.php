<?php

namespace Framework\Pdo\Repository;

use PDO;
use Framework\Pdo\PdoExtend;

class Repository
{
    private $table;
    private $pdo;

    public function __construct(PdoExtend $pdo)
    {
        $this->pdo = $pdo;
    }

    public function setTable($table)
    {
        $this->table = $table;

        return $this;
    }

    public function find($id)
    {
        $q = $this->pdo->query('SELECT * FROM ' . $this->table . ' WHERE id_' . $this->table . ' = ' . $id);

        return $q->fetch(PDO::FETCH_OBJ);
    }

    public function findAll()
    {
        $q = $this->pdo->query('SELECT * FROM ' . $this->table);

        return $q->fetch(PDO::FETCH_OBJ);
    }
}

