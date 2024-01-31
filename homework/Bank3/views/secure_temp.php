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
            background-color: LightSalmon;
        }

        nav {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        nav button {
            background: lightgreen;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            text-decoration: underline;
            margin: 0 10px;
        }

        div {
            margin: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .button-right {
            background-color: red;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .button-right:hover {
            background-color: blue;
        }
        button:hover {
            background-color: green;
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
        table tr:hover {
        background-color: #f5f5f5;
        }
        .specific-content {
       background: url('../../public/img/Capybara_capital.png') no-repeat ;
       background-size: content;
       color: black; 
       border-radius: 5px;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }
    </style>
</head>
<body>
    <div>
        <nav>
            <button onclick="location.href='http://localhost/_46-grupe_/capybaros/homework/bank3/views/logout.php'">Logout</button>
            <form method="POST" action="http://localhost/_46-grupe_/capybaros/homework/bank3/views/delete_account.php">
                <button type="submit" class="button-right">Delete account</button>
            </form>
        </nav>
    </div>
        
    <div class="specific-content">
        <h2>Welcome to CAPYBARA CAPITAL!</h2>
    </div>
</body>
</html>
