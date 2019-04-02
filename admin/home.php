<?php
require('../app/includes/init.php');
require(APP_ROOT . '/includes/redir_login.php');

$posts = $cms->getPostsByAuthor($_SESSION['currUser']['name']);

require(VIEW_ROOT . '/admin/home.php');
?>