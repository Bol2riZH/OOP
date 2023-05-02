<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';

require_once 'libraries/models/Article.php';
require_once 'libraries/models/Comment.php';

$articleModel = new Article();
$commentModel = new Comment();

$article_id = null;

if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
    $article_id = $_GET['id'];
}

if (!$article_id) {
    die("Vous devez préciser un paramètre `id` dans l'URL !");
}

$article = $articleModel->find($article_id);
$commentaires = $commentModel->findByArticle($article_id);

$pageTitle = $article['title'];
render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));
