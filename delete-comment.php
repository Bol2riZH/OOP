<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ! Fallait préciser le paramètre id en GET !");
}

$id = $_GET['id'];

$comment = findComment($id);
if (!$comment) {
    die("Aucun commentaire n'a l'identifiant $id !");
}

$article_id = $comment['article_id'];
deleteComment($id);

redirect("article.php?id=" . $article_id);
