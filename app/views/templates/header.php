<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <title>myBlog - Home</title>
        <link rel="stylesheet" href="<?= BASE_URL; ?>/app/css/app.css" type="text/css"/>
        <link rel="shortcut icon" href="<?= BASE_URL; ?>/app/icons/favicon.ico"/>
    </head>
    <body>
        <div class='wrapper'>
            <div class='banner'>
                <h1>my Blog</h1>
            	<div class="github" onclick="location.href='https://github.com/kameswarang/myBlog'">
            		<img src="<?= BASE_URL; ?>/app/img/github.png"/>
            	</div>
                <?php if(isset($_SESSION['currUser'])): ?>
                    <h4><?= $_SESSION['currUser']['name']; ?></h4>
                <?php endif; ?>
            </div>
            <ul class="navBar">
                <li><a href="<?= BASE_URL; ?>/public/home.php">Home</a></li>
                <li><a href="<?= BASE_URL; ?>/public/topics.php">Topics</a></li>
                <li><a href="<?= BASE_URL; ?>/public/authors.php">Authors</a></li>
                <?php if(isset($_SESSION['currUser'])): ?>
                    <li><a href="<?= BASE_URL; ?>/admin/home.php">Admin Home</a></li>
                    <li><a href="<?= BASE_URL; ?>/admin/add.php">New Story</a></li>
                    <li id="logout"><a href="<?= BASE_URL; ?>/admin/logout.php">Logout</a></li>
                <?php endif; ?>
            </ul>
            <div class="contentWrapper">