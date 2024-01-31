<?php

// require_once __DIR__ . '../../App/DB/DataBaseClass.php';


require_once __DIR__ . '/../vendor/autoload.php';
use App\DB\DataBaseClass;


include '../views/login_temp.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $database = new DataBaseClass();

    if ($database->authenticateByEmail($email, $password)) {
        session_start();
        $_SESSION['authenticated'] = true;
        $_SESSION['user_id'] = $database->getUserIdByEmail($email);

        header('Location: ../views/auth/secure_page.php');
        exit();
    } else {
        $error_message = "Invalid email or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($error_message)) : ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
