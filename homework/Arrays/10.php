<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 10</title>
</head>
<body>
    
<!-- 
Generate an array of 10 numbers according to the rule: The first two numbers are 
random from 5 to 25. The third is the sum of the first and second. The fourth is 
the sum of the second and third. The fifth is the sum of the third and fourth, 
and so on.
 -->
 <?php

$array = [];
$min = 5;
$max = 25;

$array[] = mt_rand($min, $max);
$array[] = mt_rand($min, $max);

for ($i = 2; $i < 10; $i++) {
    $array[] = $array[$i - 2] + $array[$i - 1];
}

echo "Generated Array: " . implode(', ', $array);

?>


</body>
</html>