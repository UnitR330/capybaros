<?php
session_start();

if (!isset($_SESSION['player1']) || isset($_POST['reset'])) {
    $_SESSION['player1'] = ['name' => '', 'score' => 0];
    $_SESSION['player2'] = ['name' => '', 'score' => 0];
    $_SESSION['currentPlayer'] = 1; 
    $_SESSION['gameOver'] = false;
    $_SESSION['gameStarted'] = false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['start'])) {
    $_SESSION['player1']['name'] = $_POST['player1'];
    $_SESSION['player2']['name'] = $_POST['player2'];
    $_SESSION['currentPlayer'] = 1;
    $_SESSION['gameStarted'] = true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['throwDice']) && $_SESSION['gameStarted'] && !$_SESSION['gameOver']) {
    $diceResult = rand(1, 6);
    $_SESSION['player' . $_SESSION['currentPlayer']]['score'] += $diceResult;

    if ($_SESSION['player1']['score'] >= 30 || $_SESSION['player2']['score'] >= 30) {
        $_SESSION['gameOver'] = true;
        $_SESSION['winner'] = $_SESSION['currentPlayer']; 
    } else {
        $_SESSION['currentPlayer'] = ($_SESSION['currentPlayer'] % 2) + 1;
    }
}
?>
<!-- 
    Program the game. The game starts with two fields where players enter their names and a "start" button. The player's score is displayed on the side. After pressing "start" the name of the first player and the button "throw the dice" should appear. When you press it, the script automatically generates a number from 1 to 6 and adds it to the player's score, and the name of the first player is replaced by the name of the second player (showing whose turn it is to "roll the dice"). The game continues until some player collects 30 points. A win message is then displayed and the player names are again allowed to be collected and the game restarted.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Game</title>
</head>
<body>

<?php if (!$_SESSION['gameStarted'] || $_SESSION['gameOver']) : ?>
    <form method="post">
        Player 1 Name: <input type="text" name="player1" required><br>
        Player 2 Name: <input type="text" name="player2" required><br>
        <input type="submit" name="start" value="Start">
    </form>
<?php endif; ?>

<?php if ($_SESSION['gameStarted']) : ?>
    <h2>Current Turn: <?php echo $_SESSION['player' . $_SESSION['currentPlayer']]['name']; ?></h2>
    <p>Player 1 Score: <?php echo $_SESSION['player1']['score']; ?></p>
    <p>Player 2 Score: <?php echo $_SESSION['player2']['score']; ?></p>

    <?php if (!$_SESSION['gameOver']) : ?>
        <form method="post">
            <input type="submit" name="throwDice" value="Throw the Dice">
        </form>
    <?php else : ?>
        <p>Game Over! <?php echo $_SESSION['player' . $_SESSION['winner']]['name']; ?> Wins!</p>
        <form method="post">
            <input type="submit" name="reset" value="Play Again">
        </form>
    <?php endif; ?>

<?php endif; ?>

</body>
</html>
