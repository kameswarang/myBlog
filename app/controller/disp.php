<?php
require('../includes/init.php');

$posts = null;

if(!empty($_GET['page'])) {
    $slug = $_GET['page'];
    $posts = [$cms->getPostBySlug($slug)];

    foreach ($posts as $post) {
        $post['created'] = (new DateTime($post['created']))->format('jS M Y');
        if(!empty($post['updated'])) {
            $post['updated'] = (new DateTime($post['updated']))->format('jS M Y h:i a');
        }
    }
    require(VIEW_ROOT . '/public/show.php');
}

else if(!empty($_GET['author'])) {
    $topic = $_GET['author'];
    $posts = $cms->getPostsByAuthor($topic);

    foreach ($posts as $post) {
        $post['created'] = (new DateTime($post['created']))->format('jS M Y');
        if(!empty($post['updated'])) {
            $post['updated'] = (new DateTime($post['updated']))->format('jS M Y h:i a');
        }
    }
    require(VIEW_ROOT . '/public/list.php');
}

else if(!empty($_GET['topic'])) {
    $topic = $_GET['topic'];
    $posts = $cms->getPostsByTopic($topic);

    foreach ($posts as $post) {
        $post['created'] = (new DateTime($post['created']))->format('jS M Y');
        if(!empty($post['updated'])) {
            $post['updated'] = (new DateTime($post['updated']))->format('jS M Y h:i a');
        }
    }
    require(VIEW_ROOT . '/public/list.php');
}

?>