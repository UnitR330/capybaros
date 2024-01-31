<?php

require_once '../vendor/initialize.php';

require_once '../App/DB/DataBaseClass.php';
include '../views/template.php';

session_start();

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    header('Location: ../views/auth/secure_page.php');
    exit();
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking System</title>
</head>
<body>
    <h1>Welcome to the Banking System</h1>
    <div>
        <button onclick="location.href='login.php'">Login</button>
        <button onclick="location.href='register.php'">Register</button>
</body>
</html>
