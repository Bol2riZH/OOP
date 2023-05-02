<?php
require_once 'libraries/database.php';

class Model
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }
}