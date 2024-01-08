<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCB main page</title>
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/css/style.css">
</head>
<body>
    <header class="floating-header">
        <div class="header-left">
            <img src="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/images/main_logo.png" alt="Logo">
        </div>
        <div class="header-center">
            <nav>
                <ul>
                    <li><a href="#">Bank</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
           <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'Already signed'): ?>
           <h2>Hello, <?= $_SESSION['name'] ?></h2>
           <a href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/authorized.php">
           <button class="authorized">Personal account</button>
           </a>
           <?php else: ?>
           <a href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/sign_in.php">
           <button class="signin-btn">Sign in!</button>
           </a>
          <?php endif ?>
    </div>
    </header>
   
    <div class="bunny-container">
        <div class="text"></div>
        <div class="grass"></div>
        <div class="bunny">
            <div class="bunny__ears">
                <div class="bunny__ear bunny__ear--left"></div>
                <div class="bunny__ear bunny__ear--right"></div>
            </div>
            <div class="bunny__feet">
                <div class="bunny__foot bunny__foot--left"></div>
                <div class="bunny__foot bunny__foot--right"></div>
            </div>
            <div class="bunny__tail"></div>
            <div class="bunny__paw"></div>
            <div class="bunny__body">
                <div class="bunny__eyes"></div>
                <div class="bunny__nose"></div>
                <div class="bunny__cheeks"></div>
                <div class="bunny__mouth"></div>
            </div>
        </div>
    </div>
    <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>
</body>
</html>
