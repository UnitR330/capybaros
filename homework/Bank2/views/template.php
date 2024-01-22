

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Prototype</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #96f9e3;
        }

        nav {
            background-color: #333;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        div {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            
            
        }
        
        .form-center {
            margin-top: 20px;
            align-items: center; 
        }

        
        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: #ff0000;
            margin-bottom: 10px;
        }

        .success {
            color: #008000;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <nav>
<?php
// Inside navigation.php

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    echo '<a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/index.php">Home</a>';
    echo '<a href="http://localhost/_46-grupe_/capybaros/homework/bank2/views/auth/logout.php">Logout</a>';
} else {
    echo '<a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/index.php">Home</a>';
    echo '<a href="http://localhost/_46-grupe_/capybaros/homework/bank2/views/auth/login.php">Login</a>';
    echo '<a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/create-account.php">Create Account</a>';
}
?>
        <!-- <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/index.php">Home</a> -->
        <!-- <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/views/auth/login.php">Login</a> -->
        <!-- <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/create-account.php">Create Account</a> -->
        <!-- <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/add-funds.php">Add Funds</a>
        <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/calculate-funds.php">Calculate Funds</a> -->
    </nav>
    <div class="specific-content">
        <h2>Here should be bank logo...</h2>
        <!-- Page-specific content will be inserted here -->
    </div>
</body>
</html>
