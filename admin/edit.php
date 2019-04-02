<?php
require('../app/includes/init.php');
require(APP_ROOT . '/includes/redir_login.php');

$post = $cms->getPostBySlug($_GET['page']);
require(VIEW_ROOT . '/admin/edit.php')
?>