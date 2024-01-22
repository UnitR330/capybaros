<?php
require_once __DIR__ . '/../../vendor/autoload.php';
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

include '../auth-temp.php';
echo '<div>Hello ' . $user->lastName . ' '  . $user->firstName . ', nice to see you!' . '</div>';
echo '<div>Your bank system ID: ' . $user->userId .  ', IBAN: ' . $user->IBAN .'</div>';
echo '<div>Account balance: €' . $balance . '</div>';

echo '<form action="../../public/add-funds.php" method="post">';
echo '<button type="submit">Make a transaction</button>';
echo '</form>';

echo '<h2>Transaction History</h2>';
echo '<table style="border-collapse: collapse; width: 100%; margin-top: 20px;">';
echo '<tr style="background-color: #f2f2f2; font-weight: bold;">';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">ID</th>';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Type</th>';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Timestamp</th>';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Amount</th>';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Actions</th>'; 
echo '</tr>';

$transactions = $database->getTransactionsByUserId($userId);

foreach ($transactions as $transaction) {
    echo '<tr>';
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $transaction['id'] . '</td>';
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $transaction['type'] . '</td>';
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . date('Y-m-d H:i:s', $transaction['timestamp']) . '</td>';
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">€' . $transaction['amount'] . '</td>';
    
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">';
    echo '<form action="delete-transaction.php" method="post">';
    echo '<input type="hidden" name="transaction_id" value="' . $transaction['id'] . '">';
    echo '<button type="submit">Delete</button>';
    echo '</form>';
    echo '</td>';
    
    echo '</tr>';
}

echo '</table>';
?>
