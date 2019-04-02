<?php
require('../app/includes/init.php');
$topics = $cms->getAllTopics();

require(VIEW_ROOT . '/templates/header.php');
?>

<?php require(VIEW_ROOT. '/public/topics.php'); ?>

<?php require(VIEW_ROOT . '/templates/footer.php'); ?>