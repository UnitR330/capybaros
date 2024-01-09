<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $users = file_get_contents(__DIR__.'/data/users.ser');
        $users = unserialize($users);
        foreach ($users as $user) {
            if ($user['email'] == $_POST['email']) {
                if ($user['password'] == sha1($_POST['password'])) {
                    $_SESSION['login'] = 'Already signed';
                    $_SESSION['name'] = $user['name'];
                    header('Location: http://localhost:8080/_46-grupe_/capybaros/homework/bank/authorized.php');
                    die;
                }
            }
        }
        $_SESSION['error'] = 'Wrong email or password';
        header('Location: http://localhost:8080/_46-grupe_/capybaros/homework/bank/sign_in.php');
        die;
    }
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
        unset($_SESSION['error']);
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign_In Form</title>
        <link rel="stylesheet" href="http://localhost:8080/_46-grupe_/capybaros/homework/bank/css/sign_in.css">   
    </head>
<body>
    

    <div id="service_message">
      <?php if (isset($error)): ?>
            <h2 style="color: white;"><?= $error ?></h2>
          <?php endif ?>
    </div>
     

    <!-- <form action="" method="post"> -->
        
        <form action="" method="post">
            <h1> Sign In <img id="logo" src="http://localhost:8080/_46-grupe_/capybaros/homework/bank/images/logo_2.png" alt="Logo"></h1>
            <label for="email">Your email:</label>
            <input type="email" name="email" placeholder="Email">
            <br>
            <label for="password">Type password:</label>
            <input type="password" name="password" placeholder="Password">
            <br>
            <a href="http://localhost:8080/_46-grupe_/capybaros/homework/bank/authorized.php">
                <button id="sign_in-btn" type="submit" href="http://localhost:8080/_46-grupe_/capybaros/homework/bank/authorized.php">Sign In</button>
                <!-- <button type="submit">Login</button> -->
            </a>
         <a href="http://localhost:8080/_46-grupe_/capybaros/homework/bank/index.php">
                <button id="return-btn" type="button">Return</button>
         </a><br>
         <p>Do not have an account? Feel free to <a href="register.php">register here</a>!</p>
    </form>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var serviceMessage = document.getElementById('service_message');
        if (serviceMessage.innerHTML.trim() !== '') {
            serviceMessage.style.display = 'block';
            setTimeout(function() {
                serviceMessage.style.display = 'none';
            }, 5000);
        }
    });
</script>
</body>
</html>
