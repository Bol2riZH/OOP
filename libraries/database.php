<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
function getPDO(): PDO
{
    return new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}

function findAllArticles(): array {
    $pdo = getPDO();
    $results = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');

    return $results->fetchAll();
}

function findArticle(int $id) {
    $pdo = getPDO();
    $query = $pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    $query->execute(['article_id' => $id]);

    return $query->fetch();
}

function findAllComments(int $article_id): array {
    $pdo = getPDO();
    $query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $article_id]);

    return $query->fetchAll();
}

function findComment(int $id) {
    $pdo = getPDO();
    $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);

    return $query->fetch();
}

function deleteArticle(int $id): void {
    $pdo = getPDO();
    $query = $pdo->prepare('DELETE FROM articles WHERE id = :id');
    $query->execute(['id' => $id]);
}

function deleteComment(int $id): void {
    $pdo = getPDO();
    $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);
}

function insertComment(string $author, string $content, int $article_id): void {
    $pdo = getPDO();
    $query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(compact('author', 'content', 'article_id'));
}


