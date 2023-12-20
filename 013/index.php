<?php
session_start();

$_SESSION['my_session'] = 'tasty_session';
$_SESSION['logged'] = 'yes session';

$_SESSION['log_time'] = time();


setcookie('my_donuts', 'tasty');
setcookie('my_donuts2', 'more tasty');

?>