<?php
require_once 'libraries/autoload.php';

use Controllers\Article;

$controller = new Article();
$controller->index();