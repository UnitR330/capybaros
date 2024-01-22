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
        $accountNumber = 'LT' . rand(10, 99) . '1234' . rand(1000, 9999) . '5678' . rand(1000, 9999);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $userId = $database->create((object)[
            'firstName' => $firstName,
            'lastName' => $lastName,
            'personalCode' => $personalCode,
            'accountNumber' => $accountNumber,
            'balance' => 0,
            'username' => $username,
            'password_hash' => $hashedPassword,
        ]);
          echo '<div>Account created successfully! User ID: ' . $userId . '</div>';
          // Redirect to public/index.php after 15 seconds
          header("refresh:15;url=http://localhost/_46-grupe_/capybaros/homework/bank2/public/index.php");
          echo '<div>You will be redirected to the home page in 15 seconds. If not, <a href="http://localhost/_46-grupe_/capybaros/homework/bank2/public/index.php">click here</a>.</div>';
  
          // Prevent further code execution
          exit();
      }
  }
  ?>

 
 
 