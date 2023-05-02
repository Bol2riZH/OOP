<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';

$article_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $article_id = $_GET['id'];
}

if (!$article_id) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}

$article = findArticle($article_id);
$commentaires = findAllComments($article_id);

$pageTitle = $article['title'];
render('articles/show', compact('pageTitle','article','commentaires','article_id'));
