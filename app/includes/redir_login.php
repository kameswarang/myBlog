<?php

if(!isset($_SESSION['currUser'])) {
    redir('login.php');
}

?>