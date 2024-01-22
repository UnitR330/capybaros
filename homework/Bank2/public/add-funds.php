<?php
require_once __DIR__ . '/../vendor/autoload.php';
use App\DB\DataBaseClass;

session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: login.php');
    exit();
}

$database = new DataBaseClass();

$userId = $_SESSION['user_id'] ?? 0;
$user = $database->show($userId);

$balance = $database->calculateBalance($userId);

include '../views/auth-temp.php';
echo '<div>Welcome to the Add Funds Page!</div>';

echo '<div>Hello ' . $user->username . '; your ID is: ' . $user->userId . '</div>';
echo '<div> IBAN: ' . $user->IBAN . '</div>';
echo '<div>Your Balance: €' . $balance . '</div>';

echo '<form action="process-add-funds.php" method="post">';
echo '<label for="amount">Enter Amount to Add:</label>';
echo '<input type="number" name="amount" required>';
echo '<label for="type">Transaction Type:</label>';
echo '<select name="type" required>';
echo '<option value="Recieve funds">Deposit</option>';
echo '<option value="Withdrawal">Withdrawal</option>';
echo '</select>';
echo '<button type="submit">Add Funds</button>';
echo '</form>';
?> 
 
 
 
 
 
 
 