<?php

use Controllers\Article;

require_once 'libraries/controllers/Article.php';

$controller = new Article();
$controller->index();