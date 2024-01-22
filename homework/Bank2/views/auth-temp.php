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
            background-color: #c796f9;
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
            width: 160px;
            margin-left: 30px;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        select{
            font-size: 20px;
        }
        button {
            margin-left:30px;
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
       
    form {
        margin-left: 30px;
    }

    table {
        margin-left: 30px;
        border-collapse: collapse;
        width: 100%;
        margin-top: 20px;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    h2 {
        text-align: center;
    }
</style>

    </style>
</head>
<body>
    <nav>
        <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/index.php">Home</a>
        <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/views/auth/login.php">Logout</a>
        <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/delete-account.php">Delete Account</a>
        <!-- 
        <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/add-funds.php">Add Funds</a>
        <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/calculate-funds.php">Calculate Funds</a> -->
    </nav>
    <div class="specific-content">
        <h2>Welcome to BIT PaPa BANK!</h2>
        <!-- Page-specific content will be inserted here -->
    </div>
</body>
</html>
