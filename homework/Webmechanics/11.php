<?php
session_start();

// Initialize or reset game if needed
if (!isset($_SESSION['player1']) || isset($_POST['reset'])) {
    $_SESSION['player1'] = ['name' => '', 'score' => 0];
    $_SESSION['player2'] = ['name' => '', 'score' => 0];
    $_SESSION['currentPlayer'] = 1; // 1 for player 1, 2 for player 2
    $_SESSION['gameOver'] = false;
    $_SESSION['gameStarted'] = false;
}

// Handle player names and start game
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start'])) {
    $_SESSION['player1']['name'] = $_POST['player1'];
    $_SESSION['player2']['name'] = $_POST['player2'];
    $_SESSION['currentPlayer'] = 1; // Start with player 1
    $_SESSION['gameStarted'] = true;
}

// Handle dice throw
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['throwDice']) && $_SESSION['gameStarted'] && !$_SESSION['gameOver']) {
    $diceResult = rand(1, 6);
    $_SESSION['player' . $_SESSION['currentPlayer']]['score'] += $diceResult;

    // Check for game over
    if ($_SESSION['player1']['score'] >= 30 || $_SESSION['player2']['score'] >= 30) {
        $_SESSION['gameOver'] = true;
        $_SESSION['winner'] = $_SESSION['currentPlayer']; // Store the winner
    } else {
        // Switch to the next player
        $_SESSION['currentPlayer'] = ($_SESSION['currentPlayer'] % 2) + 1;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Game</title>
</head>
<body>

<?php if (!$_SESSION['gameStarted'] || $_SESSION['gameOver']) : ?>
    <!-- Input fields for player names and start button -->
    <form method="post">
        Player 1 Name: <input type="text" name="player1" required><br>
        Player 2 Name: <input type="text" name="player2" required><br>
        <input type="submit" name="start" value="Start">
    </form>
<?php endif; ?>

<?php if ($_SESSION['gameStarted']) : ?>
    <!-- Game display -->
    <h2>Current Turn: <?php echo $_SESSION['player' . $_SESSION['currentPlayer']]['name']; ?></h2>
    <p>Player 1 Score: <?php echo $_SESSION['player1']['score']; ?></p>
    <p>Player 2 Score: <?php echo $_SESSION['player2']['score']; ?></p>

    <?php if (!$_SESSION['gameOver']) : ?>
        <!-- Dice throw button -->
        <form method="post">
            <input type="submit" name="throwDice" value="Throw the Dice">
        </form>
    <?php else : ?>
        <!-- Game over message -->
        <p>Game Over! <?php echo $_SESSION['player' . $_SESSION['winner']]['name']; ?> Wins!</p>
        <form method="post">
            <input type="submit" name="reset" value="Play Again">
        </form>
    <?php endif; ?>

<?php endif; ?>

</body>
</html>
