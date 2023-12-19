<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
/*
Use the rand() function. Print 3 numbers from -10 to 10. Numbers 
below 0 should be green, 0 should be red, numbers above 0 should be blue.
*/

$number1 = rand(-10, 10);
$number2 = rand(-10, 10);
$number3 = rand(-10, 10);

echo "<span style='color: " . ($number1 < 0 ? 'green' : ($number1 === 0 ? 'red' : 'blue')) . ";'>$number1</span><br>";
echo "<span style='color: " . ($number2 < 0 ? 'green' : ($number2 === 0 ? 'red' : 'blue')) . ";'>$number2</span><br>";
echo "<span style='color: " . ($number3 < 0 ? 'green' : ($number3 === 0 ? 'red' : 'blue')) . ";'>$number3</span>";


?>    
</body>
</html>