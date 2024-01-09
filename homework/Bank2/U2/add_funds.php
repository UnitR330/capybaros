<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account_number = $_POST['account_number'];
    $amount = $_POST['amount'];

    // Validate amount (simplified for demonstration)
    if (!empty($amount) && is_numeric($amount) && $amount > 0) {
        $accounts = json_decode(file_get_contents('accounts.json'), true);

        if (isset($accounts[$account_number])) {
            $accounts[$account_number]['balance'] += $amount;
            file_put_contents('accounts.json', json_encode($accounts, JSON_PRETTY_PRINT));
            $message = 'Funds added successfully.';
        } else {
            $message = 'Account not found.';
        }
    } else {
        $message = 'Invalid amount.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank - Add Funds</title>
</head>
<body>
    <h1>Bank - Add Funds</h1>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>

    <form action="" method="post">
        <label for="account_number">Account Number:</label>
        <input type="text" name="account_number" required>
        <br>
        <!-- Replace this with actual data retrieval and display logic -->
        <p>Current Balance: $500</p>
        <label for="amount">Enter Amount to Add:</label>
        <input type="number" name="amount" required>
        <br>
        <button type="submit">Add Funds</button>
    </form>
</body>
</html>
