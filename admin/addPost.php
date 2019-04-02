<?php
require('../app/includes/init.php');

$newPost = [];
$newPost['title'] = $_POST['title'];
$newPost['topic'] = strtolower($_POST['topic']);
$newPost['label'] = $_POST['label'];
$newPost['slug'] = $_POST['slug'];
$newPost['body'] = $_POST['body'];
$newPost['author'] = $_SESSION['currUser']['id'];



try {
    if($cms->addPost($newPost)) {
        echo(json_encode(array("status"=> "success")));
    }
    
    else {
        echo(json_encode(array("status"=> "fail")));
    }
}
catch(Exception $e) {
    if($e->getMessage() == 'slug exists') {
        echo(json_encode(array("status"=> "slug exists")));
    }
    else{
        logError($e);
        echo $e->getMessage();
    }
}
?>