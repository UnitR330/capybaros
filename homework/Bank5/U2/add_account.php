<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $personal_code = $_POST['personal_code'];

    // Validate personal code (simplified for demonstration)
    if (strlen($first_name) > 3 && strlen($last_name) > 3) {
        // Check if personal code is unique (simplified, in a real app, use a database)
        $accounts = json_decode(file_get_contents('accounts.json'), true);
        if (!in_array($personal_code, array_column($accounts, 'personal_code'))) {
            $iban = generateIBAN();
            $accounts[$iban] = [
                'owner' => "$first_name $last_name",
                'balance' => 0,
                'personal_code' => $personal_code,
            ];

            file_put_contents('accounts.json', json_encode($accounts, JSON_PRETTY_PRINT));
            $message = 'Account successfully created.';
        } else {
            $message = 'Personal code must be unique.';
        }
    } else {
        $message = 'Invalid first name or last name.';
    }
}

function generateIBAN()
{
    // Simplified IBAN generation (for demonstration)
    return 'DE' . sprintf('%020d', mt_rand(0, 99999999999999999999));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank - Add Account</title>
</head>
<body>
    <h1>Bank - Add Account</h1>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <form action="" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        <br>
        <label for="personal_code">Personal Code:</label>
        <input type="text" name="personal_code" required>
        <br>
        <label for="account_number">Account Number (automatically generated):</label>
        <input type="text" name="account_number" value="<?= generateIBAN() ?>" readonly>
        <br>
        <button type="submit">Create Account</button>
    </form>
</body>
</html>
