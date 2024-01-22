<?php

session_start();

require_once __DIR__ . '/../vendor/autoload.php';
use App\DB\DataBaseClass;

$database = new DataBaseClass();

include '../views/create-temp.html';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['first_name'] ?? '';
    $lastName = $_POST['last_name'] ?? '';
    $personalCode = $_POST['personal_code'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (strlen($firstName) < 3 || strlen($lastName) < 3) {
        echo '<div>Error: First and last name must be at least 3 characters long.</div>';
    } elseif (strlen($personalCode) !== 11 || !is_numeric($personalCode)) {
        echo '<div>Error: Invalid personal code.</div>';
    } else {
         
        $userData = (object)[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'personalCode' => $personalCode,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT),  
        ];

         
        $userId = $database->createUser($userData);

       
        $transactionData = (object)[
            'user_id' => $userId,
            'type' => 'creation',
            'amount' => 0,
            'description' => 'Account creation',
        ];

       
        $database->createTransaction($transactionData);

        echo '<div>Account created successfully! User ID: ' . $userId . '</div>';
    }
}
?>