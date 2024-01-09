<?php
$accounts = json_decode(file_get_contents('accounts.json'), true);

if ($accounts !== null) {
    // Sort the accounts by owner's name
    ksort($accounts);
}

$accounts = json_decode(file_get_contents('accounts.json'), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    if (!isset($accounts[$deleteId]['balance']) || $accounts[$deleteId]['balance'] === 0) {
        unset($accounts[$deleteId]);
        file_put_contents('accounts.json', json_encode($accounts, JSON_PRETTY_PRINT));
        $message = 'Account successfully deleted.';
    } else {
        $message = 'Cannot delete account with funds.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank - Accounts List</title>
</head>
<body>
    <h1>Bank - Accounts List</h1>
    <ul>
        <li><a href="add_account.php">Add Account</a></li>
        <li><a href="add_funds.php">Add Funds</a></li>
        <li><a href="deduct_funds.php">Deduct Funds</a></li>
    </ul>

    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <!-- Display a list of accounts with delete buttons -->
    <?php
    // Sort accounts by owner's name
    ksort($accounts);

    foreach ($accounts as $id => $account) {
        echo "<li>{$account['owner']} (Account Number: $id) - Balance: {$account['balance']} ";
        echo "<form method='post' style='display:inline;'>";
        echo "<input type='hidden' name='delete_id' value='$id'>";
        echo "<button type='submit' ";
        echo isset($account['balance']) && $account['balance'] !== 0 ? 'disabled' : '';
        echo ">Delete</button></form></li>";
    }
    ?>
</body>
</html>





















