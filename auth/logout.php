<?php

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    // display 405 error response
    header('HTTP/1.1 405 Method Not Allowed');
    die;
}

if (isset($_SESSION['login']) && $_SESSION['login'] == 'already sighned') {
    unset($_SESSION['login']);
    unset($_SESSION['name']);
}

header('Location: http://localhost:8080/_46-grupe_/capybaros/auth/index.php')
die;