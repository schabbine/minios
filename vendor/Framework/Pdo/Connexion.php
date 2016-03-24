<?php

namespace Framework\Pdo;

use PDO;

class Connexion
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    protected function initialize()
    {
        try {
            $this->pdo = new PdoExtend('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
        } catch (Exeption $e) {
            echo "Impossible de se connecter à la base de données: " . $e->getMessage();
            die();
        }
    }

    /**
     * @return PdoExtend
     */
    public function getPdo()
    {
        if (!$this->pdo) {
            $this->initialize();
        }

        return $this->pdo;
    }

}

