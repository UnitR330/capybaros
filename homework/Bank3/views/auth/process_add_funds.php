<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\DB\DataBaseClass;

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $database = new DataBaseClass();

    $userId = $_SESSION['user_id'] ?? 0;
    $user = $database->getUserById($userId); // Correct method name

    $amountToChange = $_POST['amount'] ?? 0;
    $transactionType = $_POST['type'] ?? 'deposit';
    $timestamp = date('Y-m-d H:i:s');

    $transactionData = [
        'userId' => $userId,
        'type' => $transactionType,
        'amount' => $transactionType === 'withdrawal' ? -$amountToChange : $amountToChange,
        'timestamp' => $timestamp,  
    ];

    $database->createTransaction((object)$transactionData);

    $userBalance = $database->calculateBalance($userId);
    $newBalance = $userBalance + $transactionData['amount'];

    header('Location: http://localhost/_46-grupe_/capybaros/homework/bank3/views/auth/secure_page.php');
    exit();
} else {
    header('Location: http://localhost/_46-grupe_/capybaros/homework/bank3/views/auth/secure_page.php');
    exit();
}
?>
