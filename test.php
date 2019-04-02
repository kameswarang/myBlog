<?php
define('ROOT', '/home/kganesh1795/www/myBlog');
define('APP_ROOT', ROOT . '/app');
define('VIEW_ROOT', APP_ROOT . '/views');
define('BASE_URL', '//35.244.50.9/myBlog');

function logError($e) {
    error_log(date("c") . " " . $e->getMessage() . PHP_EOL . $e->getTraceAsString() . PHP_EOL, 3, ROOT . '/error.log');
}

$dsn = 'mysql:host=35.244.56.200;port=3306;dbname=myBlogDB';
$usr = 'kameswarang';
$pwd = 'kantis';

try {
    $conn = new PDO($dsn, $usr, $pwd);
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    var_dump($conn);
}
catch(Exception $e) {
    echo(logError($e));
}
?>