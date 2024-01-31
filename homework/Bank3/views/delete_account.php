<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\DB\DataBaseClass;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new DataBaseClass();

    $userId = $_SESSION['user_id'] ?? 0;

    $userBalance = $database->calculateBalance($userId);

    $userBalance = (float)$userBalance;

    if ($userBalance == 0) {
        session_unset();
        session_destroy();
        $database->deleteAccount($userId);
        header('Location: ../public/index.php');
        exit();
    } else {
        $_SESSION['error'] = "Error: Account balance must be 0 before deletion.";
        header('Location: ../views/auth/secure_page.php');
        exit();
    }
}
?>
