<?php
    session_start();
    is(!isset($_SESSION['login']) || $_SESSION[''])

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inside the Forest</title>
</head>
<body>
    <h1>Welcome to Forest members page</h1>
    <h2>Hello, <?= $_SESSION['name'] ?></h2>

    <a href="index.php">Go to main page</a>
</body>
</html>