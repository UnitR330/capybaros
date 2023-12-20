<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhombus Drawing</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
    </style>
</head>
<body>

<?php

function getRandomColor() {
    $red = rand(0, 255);
    $green = rand(0, 255);
    $blue = rand(0, 255);
    return "rgb($red, $green, $blue)";
}

function generateColoredNumber() {
    return rand(0, 9);
}

$a = 21;
$b = 15;

$x0 = $a;
$y0 = $b;

 $rows = array();

for ($y = 0; $y <= 2 * $b; $y++) {
     $row = array();
    
    for ($x = 0; $x <= 2 * $a; $x++) {
         if (abs(($x - $x0) / $a) + abs(($y - $y0) / $b) <= 1) {
             $row[] = generateColoredNumber();
        } else {
             $row[] = '&nbsp; ';
        }
    }
    
     $rows[] = $row;
}

 foreach ($rows as $row) {
    echo implode('', $row) . '<br>';
}

?>

</body>
</html>
