<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\DB\DataBaseClass;

session_start();

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: ../../public/login.php');
    exit();
}

$database = new DataBaseClass();

$userId = $_SESSION['user_id'] ?? 0;
$user = $database->getUserById($userId);

$ibanResult = $database->getIbanByUserId($userId);

$iban = $ibanResult ? $ibanResult['iban'] : null;

$balance = $database->calculateBalance($userId);

include '../secure_temp.php';
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Prototype</title>
    <style>
        .add_funds {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 30%;
        }
        label {
            font-weight: bold;
        }
        input, select {
            margin-top: 10px;
            padding: 10px;
            width: 50%;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div>Welcome to the Add Funds Page!</div>
    <div>Hello <?php echo $user->last_name; ?>; your ID is: <?php echo $user->user_id; ?></div>
    <div> IBAN: <?php echo $iban ?? 'N/A'; ?></div>
    <div>Your Balance: €<?php echo $balance; ?></div>
    <div class=add_funds>
    <form action="process_add_funds.php" method="post">
        <label for="amount">Enter Amount to Add:</label>
        <input type="number" name="amount" required>
        <label for="type">Transaction Type:</label>
        <select name="type" required>
            <option value="deposit">Deposit</option>
            <option value="withdrawal">Withdrawal</option>
            <option value="transfer">Transfer</option>
        </select>
        <button type="submit">Proceed</button>
    </form>
    </div>
</body>
</html>