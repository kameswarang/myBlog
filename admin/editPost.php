<?php
require('../app/includes/init.php');

$updatedPost = [];
$updatedPost['label'] = $_POST['label'];
$updatedPost['title'] = $_POST['title'];
$updatedPost['topic'] = strtolower($_POST['topic']);
$updatedPost['slug'] = $_POST['slug'];
$updatedPost['updatedSlug'] = $_POST['updatedSlug'];
$updatedPost['body'] = $_POST['body'];

try {
    if($cms->updatePost($updatedPost)) {
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