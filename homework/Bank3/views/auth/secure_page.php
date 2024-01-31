<?php
require_once __DIR__ . '/../../vendor/autoload.php';
use App\DB\DataBaseClass;

session_start();


if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']);
} else {
    $error = '';
}

if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header('Location: ../../public/login.php');
    exit();
}

$database = new DataBaseClass();

$userId = $_SESSION['user_id'] ?? 0;
// $user = $database->show($userId);
$user = $database->getUserById($userId);

$ibanResult = $database->getIbanByUserId($userId);

$iban = $ibanResult ? $ibanResult['iban'] : null;

include '../secure_temp.php';

echo '<div>Hello ' . $user->last_name . ' '  . $user->first_name . ', nice to see you!' . '</div>';
echo '<div>Your bank system ID: ' . $user->user_id .  ', IBAN: ' . ($iban ?? 'N/A') .'</div>';

 
 
$balance = $database->calculateBalance($userId);
echo '<div>Account balance: €' . $balance . '</div>';

echo '<form action="../../views/auth/add_funds.php" method="post">';
echo '<button type="submit">Make a transaction</button>';
echo '</form>';

echo '<h2>Transaction History</h2>';

echo '<table style="border-collapse: collapse; width: 100%; margin-top: 20px;">';
echo '<tr style="background-color: #f2f2f2; font-weight: bold;">';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Transaction ID</th>';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Type</th>';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Timestamp</th>';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Amount</th>';
echo '<th style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Actions</th>'; 
echo '</tr>';

$transactions = $database->getTransactionsByUserId($userId);

foreach ($transactions as $transaction) {
    echo '<tr>';
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $transaction['transaction_id'] . '</td>';
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">' . $transaction['type'] . '</td>';

    
    
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">'  .  $transaction['timestamp'] . '</td>';
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">€' . $transaction['amount'] . '</td>';
    
    echo '<td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">';
    echo '<form action="delete_transaction.php" method="post">';
    echo '<input type="hidden" name="transaction_id" value="' . $transaction['transaction_id'] . '">';
    echo '<button type="submit">Delete</button>';
    echo '</form>';
    echo '</td>';
    
    echo '</tr>';
}

echo '</table>';
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
    </style>
</head>
<body>

<div id="myModal" class="modal">
  <div class="modal-content">
    <p><?php echo $error; ?></p>
  </div>
</div>

<script>
var modal = document.getElementById("myModal");

if ("<?php echo $error; ?>" != '') {
    modal.style.display = "block";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>