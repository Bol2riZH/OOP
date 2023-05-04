<?php

use Controllers\Comment;

require_once 'libraries/controllers/Comment.php';

$controller = new Comment();
$controller->insert();