<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7 bingo</title>
    <style>
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    font-size: 12px;  
  }
</style>
</head>
<body>

<?php

$johnPoints = 0;
$bobPoints = 0;

while ($johnPoints < 222 && $bobPoints < 222) {
    $johnPoints += rand(10, 20);
    $bobPoints += rand(5, 25);

    echo "John: $johnPoints, Bob: $bobPoints";

    if ($johnPoints >= 222) {
        echo "<br>The game was won: John";
    } elseif ($bobPoints >= 222) {
        echo "<br>The game was won: Bob";
    } else {
        echo "<br>Continue playing...<br><br>";
    }
}

?>

</body>
</html>
