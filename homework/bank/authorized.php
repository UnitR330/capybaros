
<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] != 'Already signed') {
    header('Location: http://localhost:8080/_46-grupe_/capybaros/homework/bank/sign_in.php');
    die;
}

// Include the user's account file
$userAccountFile = __DIR__.'/data/'.$_SESSION['id'].'_accounts.ser';
if (file_exists($userAccountFile)) {
    $userAccounts = unserialize(file_get_contents($userAccountFile));
} else {
    $userAccounts = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_account'])) {
    // Check if the user has already created three accounts
    if (count($userAccounts) >= 3) {
        $_SESSION['error'] = 'You can only create up to three accounts.';
        header('Location: http://localhost:8080/_46-grupe_/capybaros/homework/bank/authorized.php');
        die;
    }

    // Process account creation
    $currency = $_POST['currency']; // Assume currency is sent from the form
    $account = [
        'id' => uniqid(), // Generate a unique ID for the account
        'currency' => $currency,
        'balance' => 0,
    ];

    // Add the new account to the user's accounts
    $userAccounts[] = $account;

    // Save the updated accounts to the user's account file
    file_put_contents($userAccountFile, serialize($userAccounts));

    // Redirect back to authorized.php
    header('Location: http://localhost:8080/_46-grupe_/capybaros/homework/bank/authorized.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorized</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="http://localhost:8080/_46-grupe_/capybaros/homework/bank/css/authorized.css">
</head>
<body>
    <header>
        <div class="header-left">
            <img src="http://localhost:8080/_46-grupe_/capybaros/homework/bank/images/main_logo.png" alt="Logo">
            <h3><?= $_SESSION['name']?>, your unical account ID: <?= $_SESSION['id'] ?></h3>
            <h3><?= $_SESSION['name']?>, your unique account ID: <?= $_SESSION['id'] ?></h3>
            <form action="" method="POST">
                <label for="currency">Create Account:</label>
                <select name="currency" id="currency">
                    <option value="Euro">Euro</option>
                    <option value="Dollars">Dollars</option>
                    <option value="Pounds">Pounds</option>
                </select>
                <button type="submit" name="create_account">Create</button>
            </form>
        </div>
        
        
        
        </div>
        <div class="header-center">
            <nav>
                <ul>
                    <li><a href="index.php">Go to main page</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-right">
           <form action="http://localhost:8080/_46-grupe_/capybaros/homework/bank/sign_out.php" method="post">
               <button class="logout-btn">Logout</button>
           </form>
        </div>
        
    </header>
    
    
</body>
</html>