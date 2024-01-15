<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] == 'Already signed') {
    header('Location: http://localhost/_46-grupe_/capybaros/homework/bank/index.php');
    die;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if ($_POST['password'] != $_POST['password2']) {
        $_SESSION['error'] = 'Passwords do not match';
        $_SESSION['old_data'] = $_POST;
        header('Location: http://localhost/_46-grupe_/capybaros/homework/bank/register.php');
        die;
    }

    // Move the empty fields check outside of the loop
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $_SESSION['error'] = 'All fields must be filled';
        $_SESSION['old_data'] = $_POST;
        header('Location: http://localhost/_46-grupe_/capybaros/homework/bank/register.php');
        die;
    }

    $users = file_get_contents(__DIR__.'/data/users.ser');
    $users = unserialize($users);

    // Generate a unique 7-digit ID for the user
    $uniqueID = '1' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);

    foreach ($users as $user) {
        if ($user['email'] == $_POST['email']) {
            $_SESSION['error'] = 'User with this email address already exists.';
            $_SESSION['old_data'] = $_POST;
            header('Location: http://localhost/_46-grupe_/capybaros/homework/bank/register.php');
            die;
        }

        // Check if the generated ID already exists
        if ($user['id'] == $uniqueID) {
            $uniqueID = '1' . str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        }
    }

    $user = [
        'id' => $uniqueID,
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'password' => sha1($_POST['password']),
    ];

    $users[] = $user;
    file_put_contents(__DIR__.'/data/users.ser', serialize($users));
    header('Location: http://localhost/_46-grupe_/capybaros/homework/bank/success.php');
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
    <link rel="stylesheet" href="http://localhost/_46-grupe_/capybaros/homework/bank/css/register.css">
</head>
<body>
    <div id="service_message">
        <?php if (isset($error)): ?>
            <h2 style="color: white;"><?= $error ?></h2>
            <?php endif ?>
    </div>
    <div id="bg-wrap">
    <svg viewBox="0 0 100 100" preserveAspectRatio="xMidYMid slice">
                <defs>
                    <radialGradient id="Gradient1" cx="50%" cy="50%" fx="0.441602%" fy="50%" r=".5"><animate attributeName="fx" dur="34s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255, 0, 255, 1)"></stop><stop offset="100%" stop-color="rgba(255, 0, 255, 0)"></stop></radialGradient>  
                    <radialGradient id="Gradient2" cx="50%" cy="50%" fx="2.68147%" fy="50%" r=".5"><animate attributeName="fx" dur="23.5s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255, 255, 0, 1)"></stop><stop offset="100%" stop-color="rgba(255, 255, 0, 0)"></stop></radialGradient>
                    <radialGradient id="Gradient3" cx="50%" cy="50%" fx="0.836536%" fy="50%" r=".5"><animate attributeName="fx" dur="21.5s" values="0%;3%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0, 255, 255, 1)"></stop><stop offset="100%" stop-color="rgba(0, 255, 255, 0)"></stop></radialGradient>
                    <radialGradient id="Gradient4" cx="50%" cy="50%" fx="4.56417%" fy="50%" r=".5"><animate attributeName="fx" dur="23s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0, 255, 0, 1)"></stop><stop offset="100%" stop-color="rgba(0, 255, 0, 0)"></stop></radialGradient>
                    <radialGradient id="Gradient5" cx="50%" cy="50%" fx="2.65405%" fy="50%" r=".5"><animate attributeName="fx" dur="24.5s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(0,0,255, 1)"></stop><stop offset="100%" stop-color="rgba(0,0,255, 0)"></stop></radialGradient>
                    <radialGradient id="Gradient6" cx="50%" cy="50%" fx="0.981338%" fy="50%" r=".5"><animate attributeName="fx" dur="25.5s" values="0%;5%;0%" repeatCount="indefinite"></animate><stop offset="0%" stop-color="rgba(255,0,0, 1)"></stop><stop offset="100%" stop-color="rgba(255,0,0, 0)"></stop></radialGradient>
                </defs>
                <rect x="13.744%" y="1.18473%" width="100%" height="100%" fill="url(#Gradient1)" transform="rotate(334.41 50 50)"><animate attributeName="x" dur="20s" values="25%;0%;25%" repeatCount="indefinite"></animate><animate attributeName="y" dur="21s" values="0%;25%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="7s" repeatCount="indefinite"></animateTransform></rect>
                <rect x="-2.17916%" y="35.4267%" width="100%" height="100%" fill="url(#Gradient2)" transform="rotate(255.072 50 50)"><animate attributeName="x" dur="23s" values="-25%;0%;-25%" repeatCount="indefinite"></animate><animate attributeName="y" dur="24s" values="0%;50%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="0 50 50" to="360 50 50" dur="12s" repeatCount="indefinite"></animateTransform>
                </rect>  
                <rect x="9.00483%" y="14.5733%" width="100%" height="100%" fill="url(#Gradient3)" transform="rotate(139.903 50 50)"><animate attributeName="x" dur="25s" values="0%;25%;0%" repeatCount="indefinite"></animate><animate attributeName="y" dur="12s" values="0%;25%;0%" repeatCount="indefinite"></animate><animateTransform attributeName="transform" type="rotate" from="360 50 50" to="0 50 50" dur="9s" repeatCount="indefinite"></animateTransform>
                </rect>  
            </svg>
    </div>
     
    <form action="" method="POST" onsubmit="return validateForm()">
        <h1>Registration Form<img id="logo" src="http://localhost/_46-grupe_/capybaros/homework/bank/images/logo_1.png" alt="Logo"></h1>
        <label for="username">Username:</label>
        <input type="text" name="name" placeholder="Enter your username" value="<?= isset($old_data['name']) ? $old_data['name'] : '' ?>">
      
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your personal email" value="<?= isset($old_data['email']) ? $old_data['email'] : '' ?>">
      
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password">
      
        <label for="password2">Repeat Password:</label>
        <input type="password" name="password2" placeholder="Repeat your password">
      
        <button id="register-btn" type="submit">Register</button>
        <a href="http://localhost/_46-grupe_/capybaros/homework/bank/index.php">
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