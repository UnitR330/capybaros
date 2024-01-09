<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 7 bingo</title>
    <!-- 
    Kazys and Petras played Bingo. Peter collects the number of points from 10 to 20, 
    Kazys collects the number of points from 5 to 25. In one line, output the names of 
    the players with the number of points and "The game was won: ​winner's name​". Generate 
    the number of points with the ​rand()​ function. The player who collects 222 points the 
    fastest wins the game. Repeat the games until some player is the first to score 222 
    or more points. Do not use in the break loop.    
     -->
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
