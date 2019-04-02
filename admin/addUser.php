<?php
require('../app/includes/init.php');

$newUser = [];
$newUser['name'] = $_POST['fname'] . ' ' . $_POST['lname'];
$newUser['username'] = $_POST['user'];
$newUser['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
try {
    if($cms->addUser($newUser) == 1) {
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['currUser'] = $cms->getUserByName([$newUser['username']]);
        echo(json_encode(array("status"=> "success")));
    }
    
    else {
        echo(json_encode(array("status"=> "fail")));
    }
}
catch(Exception $e) {
    if($e->getMessage() == 'username exists') {
        echo(json_encode(array("status"=> "username exists")));
    }
    else{
        logError($e);
        echo $e->getMessage();
    }
}
?>