<?php

namespace Perruque\Classes;

use \PDO;

class Database {
    private $pdo;


    public function __construct() {

        // port 80 part défaut
        $db_port = empty(DB_PORT) ? '' : ':' . DB_PORT;

        $this->pdo = new PDO('mysql:host=' . DB_HOST . $db_port . ';dbname=' . DB_NAME, DB_USER, DB_PASS);

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $this->pdo->exec('SET NAMES UTF8');
    }

    public function executeSql($sql, array $values = array()) {
        $query = $this->pdo->prepare($sql);

        $query->execute($values);

        return $this->pdo->lastInsertId();
    }

    public function query($sql, array $criteria = array()) {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function queryOne($sql, array $criteria = array()) {
        $query = $this->pdo->prepare($sql);

        $query->execute($criteria);

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}