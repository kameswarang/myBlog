<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>myBlog - Home</title>
        <link rel="stylesheet" href="<?= BASE_URL; ?>/app/css/app.css" type="text/css" />
        <link rel="stylesheet" href="<?= BASE_URL; ?>/app/css/login.css" type="text/css" />
    </head>
    <body>
        <div class='wrapper'>
            <div class='banner'>
                <h1>my Blog</h1>
                <div class="github" onclick="location.href='https://github.com/kameswarang/myBlog'">
                        <img src="<?= BASE_URL; ?>/app/images/github.png"/>
                </div>
                <?php if(isset($_SESSION['currUser'])): ?>
                    <h4><?= $_SESSION['currUser']['name']; ?></h4>
                <?php endif; ?>
            </div>
            <ul class="navBar">
                <li><a href="<?= BASE_URL; ?>/public/home.php">Home</a></li>
                <li><a href="<?= BASE_URL; ?>/public/topics.php">Topics</a></li>
                <li><a href="<?= BASE_URL; ?>/public/authors.php">Authors</a></li>
                <li><a href="<?= BASE_URL; ?>/admin/home.php">My Stories</a></li>
                <li><a href="<?= BASE_URL; ?>/admin/add.php">New Story</a></li>
                <li id="logout"><a href="<?= BASE_URL; ?>/admin/logout.php">Logout</a></li>
            </ul>
            <div class="contentWrapper">