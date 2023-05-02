<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';

require_once 'libraries/models/Article.php';
require_once 'libraries/models/Comment.php';

$model = new Comment();

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ! Fallait préciser le paramètre id en GET !");
}

$id = $_GET['id'];

$comment = $model->find($id);
if (!$comment) {
    die("Aucun commentaire n'a l'identifiant $id !");
}

$article_id = $comment['article_id'];
$model->delete($id);

redirect("article.php?id=" . $article_id);
