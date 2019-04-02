<?php
require('../app/includes/init.php');
require(APP_ROOT . '/includes/redir_login.php');

$post = [];
$post['id'] = $_GET['page'];

if($cms->deletePost($post)) {
    header('Location: home.php');
    exit();
}

require(VIEW_ROOT . '/admin/delete.php');
?>

