<?php
// Inside login.php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\DB\DataBaseClass;

session_start();

$database = new DataBaseClass();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($database->authenticate($username, $password)) {
        // Authentication successful
        $_SESSION['authenticated'] = true;

        // Get user ID and store it in the session
        $userId = $database->getUserIdByUsername($username);

        if ($userId !== null) {
            $_SESSION['user_id'] = $userId;
            header('Location: secure-page.php');
            exit();
        } else {
            echo '<div>Error: User ID not found for the given username.</div>';
        }
    } else {
        echo '<div>Error: Invalid username or password.</div>';
    }
}

include '../login-temp.html';
echo '<div>Login:</div>';
echo '<form method="post" action="login.php">';
echo '<label for="username">Username:</label>';
echo '<input type="text" name="username" required><br>';
echo '<label for="password">Password:</label>';
echo '<input type="password" name="password" required><br>';
echo '<button type="submit">Login</button>';
echo '</form>';
?>
