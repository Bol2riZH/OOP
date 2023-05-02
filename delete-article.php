<?php
require_once 'libraries/database.php';
require_once 'libraries/utils.php';

if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ?! Tu n'as pas précisé l'id de l'article !");
}

$id = $_GET['id'];

$article = findArticle($id);
if (!$article) {
    die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
}

deleteArticle($id);

redirect("index.php");