<?php
session_start();

// Check if the request is for setting initial balance
if (isset($_POST['setInitialBalance'])) {
    setInitialBalance();
} else {
    // Standard transaction creation logic
    createTransaction();
}

function createTransaction() {
    $transactionNumber = rand(10000000, 99999999);
    $amount = $_POST['amount'] ?? 0;
    $description = $_POST['description'] ?? '';
    $timestamp = gmdate('Y-m-d\TH:i:s\Z'); // Current timestamp

    $boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);

    $boxes[] = [
        'transactionNumber' => $transactionNumber,
        'amount' => (int)$amount,
        'description' => $description,
        'timestamp' => $timestamp,
    ];

    file_put_contents(__DIR__ . '/data/boxes.json', json_encode($boxes, JSON_PRETTY_PRINT));

    $_SESSION['success'] = "Transaction #$transactionNumber created";
    header('Location: http://localhost/_46-grupe_/capybaros/homework/bank/counts/read.php');
}

function setInitialBalance() {
    $randomNumber = rand(1, 1000);

    $data = [
        'transactionNumber' => rand(10000000, 99999999),
        'amount' => $randomNumber,
        'description' => 'Initial Balance',
        'timestamp' => gmdate('Y-m-d\TH:i:s\Z'),
    ];

    $boxes = json_decode(file_get_contents(__DIR__ . '/data/boxes.json'), true);

    $boxes[] = $data;

    file_put_contents(__DIR__ . '/data/boxes.json', json_encode($boxes, JSON_PRETTY_PRINT));

    $_SESSION['success'] = "Initial balance set to $randomNumber";
    header('Location: http://localhost/_46-grupe_/capybaros/homework/bank/counts/read.php');
}
?>
 

<?php
//session_start();
//
//// Enable error reporting for debugging
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//
//function generateRandomAccountNumber() {
//    return 'A' . mt_rand(100000000, 999999999);
//}
//
//function generateRandomSerialNumber() {
//    return 'TXN' . mt_rand(100000000, 999999999);
//}
//
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    // Your existing logic to generate account details
//
//    $accountId = $_SESSION['id'];
//    $accountNumber = generateRandomAccountNumber();
//    $currency = 'Euro';
//    $initialBalance = 0;
//    $timestamp = gmdate('Y-m-d\TH:i:s\Z');
//
//    $transaction = [
//        'serialNumber' => generateRandomSerialNumber(),
//        'type' => 'credit',
//        'amount' => $initialBalance,
//        'timestamp' => $timestamp,
//        'description' => 'Initial deposit',
//    ];
//
//    $newAccount = [
//        'userId' => $accountId,
//        'accountNumber' => $accountNumber,
//        'currency' => $currency,
//        'balance' => $initialBalance,
//        'transactions' => [$transaction],
//    ];
//
//    // Load existing accounts from boxes.json
//    $accounts = json_decode(file_get_contents(__DIR__ . '/counts/data/boxes.json'), true);
//
//    if (!isset($accounts['accounts'])) {
//        $accounts['accounts'] = [];
//    }
//
//    // Check if the account number is unique
//    while (in_array($accountNumber, array_column($accounts['accounts'], 'accountNumber'))) {
//        $accountNumber = generateRandomAccountNumber();
//    }
//
//    // Add the new account to the accounts array
//    $accounts['accounts'][] = $newAccount;
//
//    // Save the updated accounts array back to boxes.json
//    file_put_contents(__DIR__ . '/counts/data/boxes.json', json_encode($accounts, JSON_PRETTY_PRINT));
//
//    // Debugging statement
//    echo "Account created successfully!";
//    
//    // Redirect to the authorized page
//    // header('Location: http://localhost/_46-grupe_/capybaros/homework/bank/authorized.php');
//    exit;
//}
//?>
