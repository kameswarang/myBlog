<?php
define('ROOT', '/app');
define('APP_ROOT', ROOT . '/app');
define('VIEW_ROOT', APP_ROOT . '/views');
define('BASE_URL', '//myblog-kganesh1795.herokuapp.com');

// This function is used in the below required scripts
function logError($e) {
    return error_log(date("c") . " " . $e->getMessage() . PHP_EOL . $e->getTraceAsString() . PHP_EOL, 3, ROOT . '/error.log');
}

require_once('content.php');

$cms = new CMS();

function redir($url) {
    header('Location: ' . $url);
    exit();
}

session_start();
?>