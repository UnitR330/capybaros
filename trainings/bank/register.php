<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == 'Already signed') {
    header('Location: http://localhost:8080/_46-grupe_/capybaros/trainings/bank/index.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['password'] != $_POST['password2']) {
        $_SESSION['error'] = 'Passwords do not match';
        $_SESSION['old_data'] = $_POST;
        header('Location: http://localhost:8080/_46-grupe_/capybaros/trainings/bank/register.php');
        die;
    }

    // Move the empty fields check outside of the loop
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $_SESSION['error'] = 'All fields must be filled';
        $_SESSION['old_data'] = $_POST;
        header('Location: http://localhost:8080/_46-grupe_/capybaros/trainings/bank/register.php');
        die;
    }

    $users = file_get_contents(__DIR__.'/data/users.ser');
    $users = unserialize($users);

    foreach ($users as $user) {
        if ($user['email'] == $_POST['email']) {
            $_SESSION['error'] = 'User with this email address already exists.';
            $_SESSION['old_data'] = $_POST;
            header('Location: http://localhost:8080/_46-grupe_/capybaros/trainings/bank/register.php');
            die;
        }
    }

    $user = [
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => sha1($_POST['password']),
    ];

    $users[] = $user;
    file_put_contents(__DIR__.'/data/users.ser', serialize($users));
    header('Location: http://localhost:8080/_46-grupe_/capybaros/trainings/bank/success.php');
    die;
}

if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
}

if (isset($_SESSION['old_data'])) {
    $old_data = $_SESSION['old_data'];
    unset($_SESSION['old_data']);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/css/register.css">
</head>
<body>
    <div id="service_message">
        <?php if (isset($error)): ?>
            <h2 style="color: white;"><?= $error ?></h2>
            <?php endif ?>
    </div>
    <div id="bg-wrap">
    </div>
     
    <form action="" method="POST" onsubmit="return validateForm()">
        <h1>Registration Form<img id="logo" src="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/images/logo_1.png" alt="Logo"></h1>
        <label for="username">Username:</label>
        <input type="text" name="name" placeholder="Enter your username" value="<?= isset($old_data['name']) ? $old_data['name'] : '' ?>">
      
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your personal email" value="<?= isset($old_data['email']) ? $old_data['email'] : '' ?>">
      
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password">
      
        <label for="password2">Repeat Password:</label>
        <input type="password" name="password2" placeholder="Repeat your password">
      
        <button id="register-btn" type="submit">Register</button>
        <a href="http://localhost:8080/_46-grupe_/capybaros/trainings/bank/index.php">
            <button id="return-btn" type="button">Return</button>
        </a>
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