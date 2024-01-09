<?php
    session_start();
    if (!isset($_SESSION['login']) || $_SESSION['login'] != 'Already signed') {
        header('Location: http://localhost:8080/_46-grupe_/capybaros/homework/bank/sign_in.php');
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorized</title>
    <link rel="stylesheet" href="http://localhost:8080/_46-grupe_/capybaros/homework/bank/css/authorized.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img src="http://localhost:8080/_46-grupe_/capybaros/homework/bank/images/main_logo.png" alt="Logo">
            <h3><?= $_SESSION['name']?>, here your funds</h3>
        </div>
        <div class="header-center">
            <nav>
                <ul>
                    <li><a href="index.php">Go to main page</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
           <form action="http://localhost:8080/_46-grupe_/capybaros/homework/bank/sign_out.php" method="post">
               <button class="logout-btn">Logout</button>
           </form>
        </div>
    </header>
    
    
</body>
</html>