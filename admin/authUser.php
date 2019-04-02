<?php
require('../app/includes/init.php');

$user = [];
$user['username'] = $_POST['user'];
$user['password'] = $_POST['password'];

$currUser = $cms->getUserByName(['username' => $user['username']]);

if(password_verify($user['password'], $currUser['password'])) {
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['currUser'] = $currUser;
    echo(json_encode(array("status"=> "success")));
}

else {
    echo(json_encode(array("status"=> "fail")));
}
?>