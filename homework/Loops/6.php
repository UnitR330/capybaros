<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 6 throw coin</title>
    <!-- 
        We toss a coin. The result of a coin falling is simulated by the rand() function, where 0 is a symbol and 1 is a number.
        We display the results of the coin toss on the screen in a separate line: "S" if a number has fallen out and "H" if a coat 
        of arms. Program three different scenarios when we stop the coin toss:
        When the coat of arms falls;
        When the coat of arms falls three times;
        Three consecutive coats of arms;
     -->
</head>
<body>

<?php

function coinToss()
{
    return rand(0, 1) == 0 ? 'Heads' : 'Tails';
}

$result1 = '';
echo '1: Stop when coin falls face<br>';
while ($result1 !== 'Heads') {
    $result1 = coinToss();
    echo $result1 . ' ';
}
echo '<br><br>';

$countHeads = 0;
$result2 = '';
echo '2: Stop when coin falls face three times<br>';
while ($countHeads < 3) {
    $result2 = coinToss();
    echo $result2 . ' ';
    if ($result2 === 'Heads') {
        $countHeads++;
    }
}
echo '<br><br>';

$countConsecutiveHeads = 0;
$result3 = '';
echo '3: Stop when coin falls face three consecutitimes in row<br>';
while ($countConsecutiveHeads < 3) {
    $result3 = coinToss();
    echo $result3 . ' ';
    if ($result3 === 'Heads') {
        $countConsecutiveHeads++;
    } else {
        $countConsecutiveHeads = 0; 
    }
}
echo '<br><br>';

?>

</body>
</html>
