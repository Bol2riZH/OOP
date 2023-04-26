<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
function getPDO(): PDO
{
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', $_ENV['SQLDB'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}

getPDO();