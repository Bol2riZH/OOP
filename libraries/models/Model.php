<?php

namespace Models;

use Database;
use PDO;

abstract class Model
{
    protected PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = Database::getPDO();
    }

    public function findAll(?string $order = ""): array
    {
        $sql = "SELECT * FROM $this->table";
        $order && $sql .= " ORDER BY " . $order;

        $results = $this->pdo->query($sql);
        return $results->fetchAll();
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $query->execute(['id' => $id]);
    }
}