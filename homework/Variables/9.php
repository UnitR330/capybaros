<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arithmetic mean</title>
</head>
<body>

<?php
/*
Use the rand() function. Create three variables with a random value between 0 and 100. Calculate their 
arithmetic mean. Put results in the arithmetic mean after discarding those values that are less than 10 or greater 
than 90. Print both averages. Round the results to a whole number.
*/

$var1 = rand(0, 100);
$var2 = rand(0, 100);
$var3 = rand(0, 100);

$originalMean = round(($var1 + $var2 + $var3) / 3);

$var1 = ($var1 < 10 || $var1 > 90) ? 0 : $var1;
$var2 = ($var2 < 10 || $var2 > 90) ? 0 : $var2;
$var3 = ($var3 < 10 || $var3 > 90) ? 0 : $var3;

$adjustedMean = round(($var1 + $var2 + $var3) / 3);

echo "Original Mean: $originalMean<br>";
echo "Recalculated Mean: $adjustedMean";

?>


</body>
</html>