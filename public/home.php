<?php
require('../app/includes/init.php');
$posts = $cms->getAllPosts();

require(VIEW_ROOT . '/templates/header.php');
?>

<?php require(VIEW_ROOT . '/public/home.php'); ?>

<?php require(VIEW_ROOT . '/templates/footer.php'); ?>