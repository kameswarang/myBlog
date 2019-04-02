<?php
require('../app/includes/init.php');
$authors = $cms->getAllAuthors();

require(VIEW_ROOT . '/templates/header.php');
?>

<?php require(VIEW_ROOT. '/public/authors.php'); ?>

<?php require(VIEW_ROOT . '/templates/footer.php'); ?>