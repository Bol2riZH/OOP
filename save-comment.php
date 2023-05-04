<?php

use Controllers\Comment;

require_once 'libraries/autoload.php';

$controller = new Comment();
$controller->insert();