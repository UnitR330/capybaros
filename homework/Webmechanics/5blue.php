<?php
    if (isset($_GET['redirect']) && $_GET['redirect'] == 'true') {
        header('Location: http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/5red.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Blue Page</title>
    <style>
        body {
            background-color: #0000FF; 
            font-size: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin: 0; 
        }
    </style>
</head>
<body>
    <a href="http://localhost:8080/_46-grupe_/capybaros/homework/Webmechanics/5blue.php?redirect=true" style = "color: white">Be BLUE</a>
</body>
</html>
