<?php
// delete-transaction.php

require_once __DIR__ . '/../../vendor/autoload.php';
use App\DB\DataBaseClass;

session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new DataBaseClass();

    $userId = $_SESSION['user_id'] ?? 0;
    $transactionId = $_POST['transaction_id'] ?? 0;

    // Perform the deletion
    $database->deleteTransaction($userId, $transactionId);

    // Redirect back to the transaction history page
    header('Location: secure-page.php');
    exit();
} else {
    // If the form is not submitted via POST, redirect to the home page or handle the error
    header('Location: secure-page.php');
    exit();
}
?>
