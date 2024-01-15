<?php
session_start();

// Function to generate a random IBAN (replace with a more realistic implementation)
function generateRandomIBAN() {
    $prefix = 'LT'; // Change this according to your country code
    $randomNumbers = mt_rand(1000, 9999);
    $iban = $prefix . $randomNumbers;

    return $iban;
}

// Set your $_SESSION['randomNumber'] somewhere before using it in the HTML

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['createEuroAccount'])) {
        // Generate a random IBAN
        $randomIBAN = generateRandomIBAN();

        // Store the generated IBAN in the session
        $_SESSION['generatedIBAN'] = $randomIBAN;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorized</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/_46-grupe_/capybaros/homework/bank/css/authorized.css">
    <script>
        function disableButton(btnId) {
            document.getElementById(btnId).disabled = true;
        }
    </script>
</head>
<body>
    <header>
        <div class="header-left">
            <img src="http://localhost/_46-grupe_/capybaros/homework/bank/images/main_logo.png" alt="Logo">
            <h3><?= $_SESSION['name'] ?? '' ?>, your bank account ID: <?= $_SESSION['id'] ?? '' ?></h3>
        </div>
        <div class="header-center">
            <nav>
                <ul>
                 
                </ul>
            </nav>
        </div>
        <div class="header-right">
            <form action="http://localhost/_46-grupe_/capybaros/homework/bank/sign_out.php" method="post">
                <button class="logout-btn">Return to main page</button>
            </form>
            <form action="http://localhost/_46-grupe_/capybaros/homework/bank/sign_out.php" method="post">
                <button class="logout-btn">Logout</button>
            </form>
        </div>
    </header>
    
    <div class="gift-funds">
        <h4>Your gift funds: <?php echo $_SESSION['randomNumber'] ?? '' ?> Euro. Put it on your account immediately!</h4>
    </div>
    
    <div class="col-2">
        <form action="" method="post">
            <button type="submit" name="createEuroAccount" class="btn btn-primary" id="createEuroBtn" onclick="disableButton('createEuroBtn')">Create Euro Account</button>
        </form>
    </div>

    <?php if (isset($_SESSION['generatedIBAN'])) : ?>
        <div class="generated-iban">
            <p>Your generated IBAN: <?php echo $_SESSION['generatedIBAN']; ?></p>
        </div>
    <?php endif; ?>
</body>
</html>
