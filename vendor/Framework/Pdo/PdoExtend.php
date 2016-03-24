<?php

namespace Framework\Pdo;

use PDO;

class PdoExtend extends PDO {

    public function getId() {
        return $this->lastInsertId();
    }
}
